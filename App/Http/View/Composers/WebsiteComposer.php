<?php

namespace App\Http\View\Composers;


use Illuminate\View\View;
use App\Models\Section;
use App\Models\Banner;
use App\Models\User;
use Carbon\Carbon;
class WebsiteComposer
{

    public function __construct()
    {

        $this->sections = Section::whereHas('translations', function($q) {
            $q->whereActive(true)->whereLocale(app()->getLocale());
        })->whereHas('menuTypes', function($q) {
            $q->where('menu_type_id', menuTypeByKey('mainMenu'));

        })->where('parent_id', null)
        ->with(['translations', 'menuTypes', 'children'])
        ->orderBy('order', 'asc')
        ->get();



        // $this->sections = Section::whereHas('translations', function($q) {
        //     $q->whereActive(true)->whereLocale(app()->getLocale());
        // })->whereHas('adminmenuTypes', function($q) {
        //     $q->where('adminmenu_type_id', menuTypeByKey('content'));

        // })->where('parent_id', null)
        // ->with(['translations', 'adminmenuType', 'children'])
        // ->orderBy('order', 'asc')
        // ->get();

        $this->footerSections = Section::whereHas('translations', function($q) {
            $q->whereActive(true)->whereLocale(app()->getLocale());
        })->whereHas('menuTypes', function($q) {
            $q->where('menu_type_id', menuTypeByKey('footerMenu'));
        })
        ->with(['translations', 'menuTypes', 'children'])
        ->orderBy('order', 'asc')
        ->get();

        $dt = Carbon::now();
        $this->birthdayBanner = User::select('name_surname as title','date as start','position','photo')->where('type_id', 4)->where('date',  $dt->toDateString())->get();

		$this->mainBanner = Banner::where('type_id', bannerTypes()['main_banner']['id'])->orderBy('date', 'desc')
        ->whereHas('translations', function ($q) {
            $q->where('active', 1);
        })->with('translations', 'files')->get();

		// $this->textPages = Banner::where('type_id', bannerTypes()['bottom_banner']['id'])->with('translations', 'files')->limit(3)->get();

    }
    public function compose(View $view)
    {
        $view->with([
			'sections' => $this->sections,
			'mainBanner' => $this->mainBanner,
			'birthdayBanner' => $this->birthdayBanner,
			'sidebar_menu' => $this->footerSections,
		]);
    }
}
