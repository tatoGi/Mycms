@extends('website.layout')
@section('content')

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
			<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
				<li class="breadcrumb-item text-muted">
					<a href="{{URL::to('/')}}" class="text-muted">{{trans('website.main')}}</a>
				</li>
				<li class="breadcrumb-item text-muted">
					<a href="{{$section->url}}" class="text-muted">{{strtoupper($section->title)}}</a>
				</li>
			</ul>
            <!--begin::Dashboard-->
            <!--begin::Row-->
            <div class="row mt-0 mt-lg-8">
                <div class="col-xl-12">
                    <div class="mb-17">

                        <!--begin::Separator-->
                        <div class="separator separator-dashed mb-9"></div>
                        <div class="card-toolbar mb-10">
                            <span class="icon-speaker title-logo-size">
								<img src="{{image($section->icon)}}" class="align-self-end" alt="">
                            </span>
                            <a href="#" class="font-weight-bolder d-ib ml-1 section-title">{{strtoupper($section->title)}}</a>
                        </div>
                        <!--end::Separator-->
                        <!--begin::Row-->
                        <div class="row g-10">
                            <!--begin::Col-->
                            @if(isset($posts))
                            @foreach($posts as $post)
                            @if($post->translate(app()->getLocale()) != '')
                            <div class="col-xxl-4 col-xl-6 col-12 mb-15">
                                <!--begin::Hot sales post-->

                                <div class="card card-custom me-md-6">
                                    <!--begin::Overlay-->
                                    <a class="d-block" data-fslightbox="lightbox-hot-sales" href="{{ $post->getFullSlug() }}">
                                        <!--begin::Image-->
                                        <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover min-h-217px" style="background-image:url({{image($post->thumb)}})"></div>
                                        <!--end::Image-->
                                    </a>
                                    <!--end::Overlay-->
                                    <!--begin::Body-->
                                    <div class="mt-5">

                                        <a href="{{ $post->getFullSlug() }}" class="post-title">{{ $post->translate(app()->getLocale())->title }}</a>
                                        <div class="post-text">
                                            {!! $post->translate(app()->getLocale())->desc !!}
                                        </div>
                                    </div>
                                    <div class="fs-6 fw-bolder mt-10 d-flex flex-stack">
										<!--begin::Label-->
										<span class="badge border-dashed fs-2 fw-bolder btn-padd">{{ $post->date }}</span>
										<!--end::Label-->
										<!--begin::Action-->
										<a href="{{ $post->getFullSlug() }}" class="btn btn-primary btn-padd">{{trans('website.more')}}</a>
										<!--end::Action-->
									</div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Hot sales post-->
                            </div>
                            @endif
                            @endforeach
                            @endif
                            <!--end::Col-->
                            <div class="col-md-12">
                                {{ $posts->links("website.components.pagination") }}
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
