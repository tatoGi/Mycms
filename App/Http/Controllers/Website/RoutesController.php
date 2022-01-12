<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;

use App\Http\Controllers\Website\PagesController;
use Illuminate\Http\Request;
use App\Models\Slug;

class RoutesController extends Controller
{
    public function index($url){
		if($url  == 'profile'){
			return PagesController::profile();
		}elseif($url  == 'update_profile'){
			return PagesController::update_profile();
		}elseif($url  == 'emp_profile_update'){
			return PagesController::emp_profile_update();
		}else{
        	$slug = Slug::where('fullSlug', "/".app()->getLocale()."/{$url}")->first();
			if($slug != ''){
				$model = $slug->slugable()->first();
				$locales = null;
				$localeSlugs = Slug::where('slugable_type', $slug->slugable_type)->where('slugable_id', $slug->slugable_id)->get();
				if ($localeSlugs !== null) {
					$locales = [];
					foreach ($localeSlugs as $value) {
						if (request()->has('page')) {
							$locales[$value->locale] = $value->fullSlug.'?page='.request()->get('page');
					
						}else{
							$locales[$value->locale] = $value->fullSlug;
		
						}
					}
				}
		
				if ($slug->slugable_type === "App\Models\Section") {
					return PagesController::index($model, $locales);
				}
				if ($slug->slugable_type === "App\Models\Post") {
					return PagesController::show($model, $locales);
				}
			}
		}
        
    }
}
