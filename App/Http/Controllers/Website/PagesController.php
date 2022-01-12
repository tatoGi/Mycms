<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\SectionTranslation;
use App\Models\Subscription;
use App\Models\Post;
use App\Models\PostTranslation;
use App\Models\PostFile;
use App\Models\Slug;
use App\Models\Submission;
use App\Models\SubmissionFile;
use App\Models\Attandance;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\View\View;
use DB;
use File;
use App\Models\Employes;
use Illuminate\Support\Facades\Hash;

class PagesController extends Controller
{
	public static function index($model, $locales){
		if ($model->type['type'] == 1) {
			$post = Post::where('section_id', $model->id)->with('translations', 'files')->first();
			if($post != ''){
				return self::show($post, $locales);
			}else{
				return view("website.pages.text_page.index", compact(['model']));
			}
		}
		if ($model->type['type'] == 5) {
			return self::submenu($model);
		}
		if ($model->type_id == 9) {
			return self::structure($model);
		}
		if ($model->type_id == 10) {
			return self::recomendation($model);
		}
		if ($model->type_id == 11) {
			return self::calendar($model);
		}
		if ($model->type_id == 12) {
			return self::employees($model);
		}
		if ($model->type['type'] == 0) {
			return self::homePage($model, $locales);
		}
		if (request()->method() == 'POST') {
			$post = Post::where('section_id', $model->id)->with('translations', 'files')->first();
			return self::submission($post);
		}
		$section = $model;

		$posts = Post::where('section_id', $model->id)->orderBy('created_at', 'desc')->with(['translations' => function ($query) {
			$query->where('active', 1);
		}])->paginate(settings('Paginate'));
		return view("website.pages.{$model->type['folder']}.index", compact(['section', 'posts', 'locales', 'model']));
	}


	public static function submenu($model){
		$submenu_sections = Section::where('parent_id' , $model->id)->get();
		return view("website.pages.submenu.index", compact('model','submenu_sections') );
	}

	public static function recomendation($model){
		$post = Post::where('section_id', $model->id)->with(['translations'])->first();
		$sub_section = User::select('sub_section as sub')->groupBy('sub')->get();

		return view("website.pages.recomendations.index", compact('model','post','sub_section') );
	}
	public static function calendar($model){
		$birthdays = User::select('name_surname as title', 'date as start')->where('type_id', 4)->get();
		foreach($birthdays as $key => $val){
			if($val->start != ''){
				$pieces = explode(".", $val->start);
				$brth_dat = now()->year.'-'.$pieces[1].'-'.$pieces[0];
				$val->start = $brth_dat;
			}
		}
		return view("website.pages.calendar.index", compact('model','birthdays') );
	}
	public static function employees($model){
		$employees = User::orderBy('name_surname', 'desc')->where('type_id', 4)->get();
		return view("website.pages.employees.index", compact('model', 'employees') );
	}
	public static function structure($model){
		$parent_type = $model->parent->type_id;
		$submenu_sections = Section::where('parent_id' , $model->id)->orderBy('order')->with('translations')->get();
		return view("website.pages.structure.index", compact('model','submenu_sections', 'parent_type') );
	}

	public static function show($model, $locales){
		if (request()->method() == 'POST') {
			return self::submission($model);
		}
		$breadcrumbs = [];
		$sec = Section::where('id', $model->section_id)->with('translations')->first();

		$latest_news = Post::where([['id','!=', $model->id],['section_id', $model->section_id]])->with(['translations' => function ($query) {
			$query->where('active', 1);
		}])->orderBy('date', 'desc')->get();
		$breadcrumbs[] = [
			'name' => $sec->title,
			'url' => $sec->getFullSlug()
		];
		while ($sec->parent_id !== null) {
			$sec = Section::where('id', $sec->parent_id)->with('translations')->first();
			$breadcrumbs[] = [
				'name' => $sec->title,
				'url' => $sec->getFullSlug()
			];
		}
		// $breadcrumbs[] = [
		// 	'name' => $sec->title,
		// 	'url' => $sec->getFullSlug()
		// ];
		// $breadcrumbs = array_reverse($breadcrumbs);
		$section = $model->parent()->first();

		$model->views = $model->views + 1;


		$model->save();
		return view("website.pages.{$section->type['folder']}.show", [
			'section' => $section,
			'model' => $model,
			'post' => $model,
			'breadcrumbs' => $breadcrumbs,
			'locales' => $locales,
			'latest_news' => $latest_news
		])->render();
	}

	public static function submission(Request $request){
		$validated = $request->validate([
			'name_surname' => 'required',
			'sub_section' => 'required',
			'letter' => 'required',
		]);
		$values = request()->all();
		if($request->identity != 1){
			$values['user_id'] = trans('website.unknown');
			$values['name'] = trans('website.unknown');
		}
		$values['additional'] = getAdditional($values, config('submissionAttr.additional'));
		$submission = Submission::create($values);

		return redirect()->back()->with([
			'message' => trans('website.submission_sent'),
		]);
	}

	public static function homePage($model, $locales = null){
		if ($locales == null) {
			$locales = [];
			foreach (config('app.locales') as $value) {
				$locales[$value] =  '/' . $value;
			}
		}
		$mainBanner = Banner::where('type_id', bannerTypes()['main_banner']['id'])
			->whereHas('translations', function ($q) {
				$q->where('active', 1);
			})->with('translations', 'files')->get();
			// dd($mainBanner);
		// $bottom_banner = Banner::where('type_id', bannerTypes()['bottom_banner']['id'])
		// 	->whereHas('translations', function ($q) {
		// 		$q->where('active', 1);
		// 	})
		// 	->with('translations', 'files')->first();

		// $latest_news = Post::where('section_id', settings('News_page'))->where('date', '>', Carbon::now())->orderBy('views', 'desc')->with('translations')->limit(4)->get();
		// $post_sections = Section::whereIn('type_id', [6, 4, 5])->get();
		$news = Post::where('active_on_home', 1)
		->with(['translations'],['parent' => function ($query) {
			$query-whereIn('type_id', [6, 4, 5]);
		}])
		->orderBy('date', 'desc')->paginate(settings('Paginate'));

		// $events = Post::where('section_id', settings('Events'))->orderBy('date', 'desc')->with('translations')->limit(4)->get();
		// $Risk_events = Post::where('section_id', settings('risk_events'))->orderBy('date', 'desc')->with('translations')->limit(4)->get();
		// $Risk_events_section = Section::where('id', settings('risk_events'))->with('translations')->first();
		// $Latest_news_section = Section::where('id', settings('News_page'))->with('translations')->first();
		// $Events_section = Section::where('id', settings('Events'))->with('translations')->first();
		// $analitycs_section = Section::where('id', settings('Analytics'))->with('translations')->first();
		// $analytics = Post::where('section_id', settings('Analytics'))->orderBy('date', 'desc')->with('translations')->limit(4)->get();
		// $leftEvents = $rigtEvents = [];
		// foreach ($events as $key => $event) {
		// 	if (count($leftEvents) != 1) {
		// 		$leftEvents[] = $event;
		// 	} else {
		// 		$rigtEvents[] = $event;
		// 	}
		// }
		// $leftriskEvents = $rigtriskEvents = [];
		// foreach ($Risk_events as $key => $riskevent) {
		// 	if (count($leftriskEvents) != 1) {
		// 		$leftriskEvents[] = $riskevent;
		// 	} else {
		// 		$rigtriskEvents[] = $riskevent;
		// 	}
		// }
		// $newsEven = $newsOdd = [];
		// $i = 1;
		// foreach ($news as $post) {
		// 	if ($i % 2 == 0) {
		// 		$newsEven[] = $post;
		// 	} else {
		// 		$newsOdd[] = $post;
		// 	}
		// 	$i++;
		// }
		return view('website.home', compact('locales', 'news'));
	}

	public static function subscribe(Request $request){
		$validatedData = $request->validate([
			'email' => 'required|email',
		]);
		$subscriber = Subscription::where('email', $validatedData['email'])->first();
		if ($subscriber == null) {
			$subscription = new Subscription;
			$subscription->locale = app()->getLocale();
			$subscription->email = $validatedData['email'];
			$subscription->save();
			return response()->json(trans('website.successfuly_subscribed'));
		}
		return response()->json(trans('website.allready_subscribed'));
	}

	public static function search(Request $request){
		$validatedData = $request->validate([
			'text' => 'required',
		]);
		$searchText = $validatedData['text'];
		$postTranlations = PostTranslation::whereActive(true)->whereLocale(app()->getLocale())
			->where('title', 'LIKE', "%{$searchText}%")
			->orWhere('desc', 'LIKE', "%{$searchText}%")
			->orWhere('text', 'LIKE', "%{$searchText}%")
			->orWhere('keywords', 'LIKE', "%{$searchText}%")
			->orWhere('locale_additional', 'LIKE', "%{$searchText}%")->pluck('post_id')->toArray();
		$posts  = Post::whereIn('id', $postTranlations)->with('translations', 'parent', 'parent.translations')->paginate(18);
		$data = [];
		foreach ($posts as $post) {
			$data[] = [
				'slug' => $post->getFullSlug() ?? '#',
				'title' => $post->translate(app()->getLocale())->title,
				'desc' => str_limit(strip_tags($post->translate(app()->getLocale())->desc)),
			];
		}
		return view('website.pages.search.index', compact('posts'));
	}

	public static function profile(){
		$emp = User::where('id_number', auth()->user()->id_number)->first();
		$date = Attandance::select('date', 'come', 'go')->where('id_number', auth()->user()->id_number)->get();
		$arr = $date->toArray();
		$nr = (int)ceil(count($date) / 2);
		if($arr && $nr != null){
			$attendances =  array_chunk($arr, $nr);
		}
		else{
			$attendances = null;
		}
		return view('website.pages.employees.show', compact('emp','attendances'));
	}
	public static function update_profile(){

		return view('website.pages.employees.update');
	}

	public static function emp_profile_update(Request $request){
		$request->validate([
			'current_password' => 'required',
		]);
		$user = auth()->user();
		$folderPath = config('config.profile_path');

		if (!Hash::check($request->current_password, $user->password)) {
			return back()->with('error', 'გთხოვთ შეიყვანოთ სწორი პაროლი!');
		}
		if(($request->base_photo != 0) && ($request->password != '')){

			$request->validate([
				'password' => 'required|string|min:4|confirmed',
				'password_confirmation' => 'required',
			  ]);
			if(($user->photo != '') && (file_exists( $folderPath.$user->photo ))) {
				unlink($folderPath.$user->photo);
			}
			$image_parts = explode(";base64,",$request->base_photo);
			$image_type_aux = explode("image/", $image_parts[0]);
			$image_type = $image_type_aux[1];
			$image_base64 = base64_decode($image_parts[1]);
			$file = $folderPath . uniqid() . '.'.$image_type;
			$user->photo = basename($file);
			$user->password = Hash::make($request->password);

			file_put_contents($file, $image_base64);
			$user->save();
			return back()->with('success', 'პროფილის სურათი და პაროლი წარმატებით შეიცვალა');
		}elseif(($request->base_photo != 0) && ($request->password == '')){


			if(($user->photo != '') && (file_exists( $folderPath.$user->photo ))) {
				unlink($folderPath.$user->photo);
			}

			$image_parts = explode(";base64,",$request->base_photo);
			$image_type_aux = explode("image/", $image_parts[0]);
			$image_type = $image_type_aux[1];
			$image_base64 = base64_decode($image_parts[1]);
			$file = $folderPath . uniqid() . '.'.$image_type;
			$user->photo = basename($file);

			file_put_contents($file, $image_base64);
			$user->save();
			return back()->with('success', 'პროფილის სურათი  წარმატებით შეიცვალა');

		}else{
			$request->validate([
				'password' => 'required|string|min:4|confirmed',
				'password_confirmation' => 'required',
			  ]);

			  $user->password = Hash::make($request->password);
			  $user->save();

			  return back()->with('success', 'პაროლი წარმატებით შეიცვალა!');

		}
    }

}
