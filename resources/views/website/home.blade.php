@extends('website.master')
@section('main')
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
	<!--begin::Container-->
	<div class="container resp-p-0">
		<!--begin::Dashboard-->
		<!--begin::Row-->
		<div class="row mt-0 mt-lg-4">
			<div class="col-xl-12 resp-p-0">
				<div class="mb-17">
					<!--begin::Separator-->
					<div class="separator separator-dashed mb-2"></div>
					<!--end::Separator-->
					<!--begin::Row-->
					<div class="row g-10 home-resp-colums">
						<!--begin::Col-->
						@if(isset($news) && (count($news) > 0))
						@foreach($news as $key => $post)
						@if($post->parent->type_id == 3)
						<div class="col-xxl-4 col-xl-6 col-lg-12">
							<!--begin::Hot sales post-->
							<div class="card card-custom me-md-6 mb-12">
								<div class="card-header" style="padding-left: 0px!important;">
									<div class="card-title">
										<span class="card-icon index-card-size">
											<img src="{{image($post->parent->icon)}}" class="align-self-end" alt="">
										</span>
										<h3 class="fs-18">{{$post->parent->translate(app()->getLocale())->title}}</h3>
									</div>
								</div>
								<!--begin::Overlay-->
								<a class="d-block" href="{{ $post->getFullSlug() }}">
									<!--begin::Image-->
									<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover min-h-217px" style="background-image:url({{image($post->thumb)}})"></div>
									<!--end::Image-->
								</a>
								<!--end::Overlay-->
								<!--begin::Body-->
								<div class="mt-5">
									<!--begin::Title-->
									
									
									<a href="{{ $post->getFullSlug() }}" class="post-title">{{ $post->translate(app()->getLocale())->title }}</a>
									<div class="post-text">
										{!! $post->translate(app()->getLocale())->desc !!}
									</div>

									<div class="fs-6 fw-bolder mt-10 d-flex flex-stack">
										<!--begin::Label-->
										<span class="badge border-dashed fs-2 fw-bolder btn-padd">{{ $post->date }}</span>
										<!--end::Label-->
										<!--begin::Action-->
										<a href="{{ $post->getFullSlug() }}" class="btn btn-primary btn-padd">{{trans('website.more')}}</a>
										<!--end::Action-->
									</div>
									<!--end::Text-->
								</div>
								<!--end::Body-->
							</div>
							<!--end::Hot sales post-->
						</div>
						@elseif($post->parent->type_id == 6)
						<div class="col-xxl-4 col-xl-6 col-lg-12">
							<div class="card card-custom gutter-b card-stretch">

								<div class="card-header" style="padding-left: 0px!important;">
									<div class="card-title">
										<span class="card-icon index-card-size">
											<img src="{{image($post->parent->icon)}}" class="align-self-end" alt="">
										</span>
										<h3 class="fs-18">{{$post->parent->translate(app()->getLocale())->title}} </h3>
									</div>
								</div>
								<!--begin::Body-->
								<div class="manager-card">
									<!--begin::User-->
									<div class="d-flex align-items-end mb-3">
										<!--begin::Pic-->
										<div class="d-flex align-items-center">
											<!--begin::Pic-->
											<div class="flex-shrink-0 managment mt-lg-0 mt-3">
												<div class="symbol symbol-lg-75">
													<img src="{{image($post->thumb)}}" alt="image">
												</div>
											</div>
											<!--end::Pic-->
											<!--begin::Title-->
											<div class="d-flex flex-column">

												<a href="{{ $post->getFullSlug() }}" class="font-weight-bold text-hover-primary mb-0 index-user case_on">{{ $post->translate(app()->getLocale())->title }}</a>

												<span class="text-muted bold mt-5 mb-5">ადმინისტრაციული მენეჯერი</span>
											</div>
											<!--end::Title-->
										</div>
										<!--end::Title-->
									</div>
									<!--end::User-->
									<!--begin::Desc-->
									

									
									<div class="managment-text-limit">
										<p class="mb-6"></p>
										<p>{!! $post->translate(app()->getLocale())->desc !!}</p>
										<p class="mb-3"></p>
									</div>
									<!--end::Desc-->
									<!--begin::Text-->
									<div class="row mt-10 d-flex">
										<div class="col-7"></div>
											<div class="col-5">
												<a href="{{ $post->getFullSlug() }}" class="btn btn-primary btn-padd btn-padd-2">{{trans('website.more')}}</a>
											</div>
									</div>

									
								</div>
								<!--end::Body-->
							</div>
						</div>
						@elseif($post->parent->type_id == 4)
						@if(isset($post->translate(app()->getLocale())->locale_additional['publications']['file']) && ($post->translate(app()->getLocale())->locale_additional['publications']['file'] != ''))
						<div class="col-xxl-4 col-xl-6 col-lg-12">
							<!--begin::Hot sales post-->
							<div class="card card-custom me-md-6 mb-12">
								<div class="card-header" style="padding-left: 0px!important;">
									<div class="card-title">
										<span class="card-icon index-card-size">
											<img src="{{image($post->parent->icon)}}" class="align-self-end" alt="">
										</span>
										<h3 class="fs-18">{{$post->parent->translate(app()->getLocale())->title}} </h3>
									</div>
								</div>
								<!--begin::Overlay-->
								<a class="d-block" target="_blank" href="/uploads/files/{{$post->translate(app()->getLocale())->locale_additional['publications']['file']}}">
									<a class="nav-link border d-flex flex-grow-1 flex-column align-items-center min-h-217px" target="_blank" href="/uploads/files/{{$post->translate(app()->getLocale())->locale_additional['publications']['file']}}">
										<span class="nav-icon py-2 w-auto">
											<span class="icon-writing example"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
										</span>
									</a>
								</a>
								<!--end::Overlay-->
								<!--begin::Body-->
								<div class="mt-5">
									<!--begin::Title-->
									<a target="_blank" href="/uploads/files/{{$post->translate(app()->getLocale())->locale_additional['publications']['file']}}"class="post-title">{{ $post->translate(app()->getLocale())->title }}</a>
									<div class="post-text">
										{!! $post->translate(app()->getLocale())->text !!}
									</div>
									<!--begin::Text-->
									<div class="fs-6 fw-bolder mt-10 d-flex flex-stack">
										<!--begin::Label-->
										<span class="badge border-dashed fs-2 fw-bolder btn-padd">{{$post->date}}</span>
										<!--end::Label-->
										<!--begin::Action-->
										<a target="_blank" href="/uploads/files/{{$post->translate(app()->getLocale())->locale_additional['publications']['file']}}" class="btn btn-primary btn-padd">{{trans('website.more')}}</a>
										<!--end::Action-->
									</div>
									<!--end::Text-->
								</div>
								<!--end::Body-->
							</div>
							<!--end::Hot sales post-->
						</div>
						@endif
						@endif
						@endforeach
						@else
						<div class="alert alert-secondary" role="alert" style="margin: 10px auto">{{trans('website.no_info')}}</div>
						@endif
						<!--end::Col-->
						<!--end::Col-->
						<div class="col-md-12">
							{{ $news->links("website.components.pagination") }}
						</div>
					</div>
					<!--end::Row-->
				</div>

			</div>

		</div>
		<!--end::Row-->
		<!--end::Dashboard-->
	</div>
	<!--end::Container-->
</div>
<!--end::Entry-->
@endsection