<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Section;
use App\Models\MenuSection;
use App\Models\Slug;
use App\Models\files;
use App\Models\SectionTranslation;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Redirect;
use Cviebrock\EloquentSluggable\Services\SlugService;

class SectionController extends Controller
{

    /**
     * index
     *  Lists Sections
     * @return void
     */
    public function index(){

        $sections = Section::where('parent_id', null)->orderBy('order', 'asc')->with('children')->get();
        return view('admin.sections.list', compact('sections'));

    }

    public function create(){

        $sectionTypes = sectionTypes();
        $sections = Section::with('translations')->get();
        $menuTypes = menuTypes();

        return view('admin.sections.add', compact(['sectionTypes', 'sections', 'menuTypes']));
    }

    public function store(Request $request){
        
        $values = $request->all();
        Validator::validate($values, [
            'type_id' => 'required'
        ]);
        $values['additional'] = getAdditional($values, config('sectionAttr.additional'));
        foreach(locales() as $locale){
			if($values[$locale]['slug'] != ''){

                $values[$locale]['slug'] = str_replace(' ', '-', $values[$locale]['slug']);
                Validator::validate($values[$locale], [
                    'slug' => 'unique:section_translations,slug,',
                ]);
            }else{

				$values[$locale]['slug'] = SlugService::createSlug(SectionTranslation::class, 'slug', $values[$locale]['title']);
            }
        }
        $section = Section::create($values);

        foreach(locales() as $locale){
            $section->slugs()->create([
                'fullSlug' => genFullSlug($section, $locale),
                'locale' => $locale
            ]);
        }
        if(isset($request->file_type) && (count($request->file_type) > 0)) {
            foreach($request->file_type as $key => $file){
                $originalName = $file->getClientOriginalName();
                $newName = uniqid() . "." . $file->getClientOriginalExtension();
                $file->move(config('config.file_path'), $newName );
                        files::create([
                            'section_id' => $section->id,
                            'post_id' => '1',
                            'name' => $originalName,
                            'file' => $newName,
                        ]);
            }
        }
		if (isset($values['menu_types']) && $values['menu_types'] !== null) {
			foreach($values['menu_types'] as $type){
				MenuSection::create([
					'section_id' => $section->id,
					'menu_type_id' => $type
				]);
			}
		}

        return Redirect::route('section.list', [app()->getLocale()]);
    }

      public function edit($id){

        $sectionTypes = sectionTypes();
        $section = Section::where('id', $id)->with(['translations', 'menuTypes','files'])->first();
        $sections = Section::with('translations')->where('id', '!=', $section->id)->where('parent_id', '!=', $section->id)->orWhere('parent_id', null)->get();
        $menuTypes = menuTypes();

        return view('admin.sections.edit', compact(['sections', 'section', 'sectionTypes', 'menuTypes']));
    }



    public function update($id, Request $request){

        $values = $request->all();
        Validator::validate($values, [
            'type_id' => 'required'
        ]);


        if(isset($request->file_type) && (count($request->file_type) > 0)) {
            foreach($request->file_type as $key => $file){
                $originalName = $file->getClientOriginalName();
                $newName = uniqid() . "." . $file->getClientOriginalExtension();
                $file->move(config('config.file_path'), $newName );
                        files::create([
                            'section_id' => $request->id,
                            'post_id' => '1',
                            'name' => $originalName,
                            'file' => $newName,
                        ]);
            }
        }


        if(isset($request->old_files) && (count($request->old_files) > 0)) {
            foreach($request->old_files as $k => $old_file){

                $old_file::find($id)->delete();
                unlink($old_file);


            }



                return Redirect()->back()->with('success', 'File Delete Successfully');

        }
            // foreach(Section::find($file)->file()->get() as $file){
            //     File::where('old_file', 'LIKE', $file)->delete();
            // }
            // if(file_exists(public_path('uploads/files'))){
            //     unlink(public_path('uploads/files'));
            //     }else{
            //     dd('File does not exists.');
            //     }
            //     return Redirect()->back()->with('success', 'File Delete Successfully');


        $values['additional'] = getAdditional($values, config('sectionAttr.additional'));
        foreach(locales() as $locale){

            if(isset($values[$locale]['active']) && $values[$locale]['active'] == 1){


              //  $values[$locale]['locale_additional'] = getAdditional($values[$locale], config('sectionAttr.translateable_additional'));

            }
        }
        $section = Section::find($id)->update($values);
        MenuSection::where('section_id', $id)->delete();
        if (isset($values['menu_types']) && $values['menu_types'] !== null) {
            foreach($values['menu_types'] as $type){
                MenuSection::create([
                    'section_id' => $id,
                    'menu_type_id' => $type
                ]);
            }
        }

        $section = Section::find($id);
        foreach(locales() as $locale){
            if(isset($values[$locale]['active']) && $values[$locale]['active'] == 1){
                $oldSlug = Section::find($id)->slugs()->where('locale', $locale)->first();
                if ($oldSlug !== null) {
                    $newSlug = genFullSlug($section, $locale);


                    $slugs = Slug::where('fullSlug', 'LIKE', $oldSlug->fullSlug.'%')->get();
                    if (count($slugs) > 0) {
                        foreach($slugs as $slug){
                            $oldFullSlug = $slug->fullSlug;
                            $newFullSlug = str_replace($oldSlug->fullSlug, $newSlug, $slug->fullSlug);
                            $slug->fullSlug = $newFullSlug;
                         }
                    }
                }else{
                    $section->slugs()->create([
                        'fullSlug' => genFullSlug($section, $locale),
                        'locale' => $locale
                    ]);
                }
            }

        }
        return Redirect::route('section.list', [app()->getLocale()]);
    }

    public function destroy($id) {
        $sec = Section::find($id)->with('translations')->first();
        foreach(Section::find($id)->slugs()->get() as $slug){
            Slug::where('fullSlug', 'LIKE', $slug->fullSlug.'%')->delete();
        }


        Section::find($id)->slugs()->delete();
        Section::find($id)->delete();

        return Redirect::route('section.list', [app()->getLocale()]);
    }


        public function arrange(Request $request) {
            $array = $request->input('orderArr');
            Section::rearrange($array);
            return ['error' => false];
        }

        public function DeleteFiles($que) {
            $file = files::where('id', $que)->first();
            unlink(public_path("uploads/files/{$file->file}"));
            files::find($que)->delete();
            return response()->json(['success' => 'File Deleted']);
        }

}
