<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;

class SettingsController extends Controller
{
    public function edit(){
        $settings = config('settings');
        $sections = Section::with('translations')->get();

         
        
        return view('admin.settings.edit', compact(['settings', 'sections']));
    }
    public function update(Request $request){
     

        foreach($request->all() as $key => $values){
            if ($key !== '_token') {
                $settings = config('settings.'.$key);
                $filename = base_path("config/settings/{$key}.php");
                $contents = arrayToPhpArray(array_replace_recursive($settings,$values));
                if(is_file($filename)) {
                    file_put_contents($filename, $contents);
                }
            }
        }
        return redirect("/".app()->getLocale()."/admin")->with('message', trans('admin.successfully_saved'));
    }
}
