@extends('website.layout')

@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Dashboard-->
            <!--begin::Row-->
            <div class="row mt-0 mt-lg-8">
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{URL::to('/')}}" class="text-muted">{{trans('website.main')}}</a>
                    </li>
                    @foreach($breadcrumbs as $key => $crumb)
                    <li class="breadcrumb-item text-muted">
                        <a href="{{$crumb['url']}}" class="text-muted">{{$crumb['name']}}</a>
                    </li>
                    @endforeach
                </ul>
                <div class="col-xl-12">
                    <div class="mb-17">
                        <!--begin::Separator-->
                        <div class="separator separator-dashed mb-9"></div>
                        <!--end::Separator-->
                        <!--begin::Row-->
                        <div class="row g-10">
                            <!--begin::Col-->
                            <span class="icon-square title-logo-size">
                                <img src="{{image($section->icon)}}" class="align-self-end" alt="">
                            </span>
                            <h5 class="text-dark font-weight-bold my-1 mr-5 text-page-title">{{strtoupper($post->translate(app()->getLocale())->title)}}</h5>
                            <div class="text-dark-50 line-height-lg mb-8 mt-2">
                                <p>{!! $post->translate(app()->getLocale())->text !!}</p>
                                <h5 class="text-dark text-page-title mt-4 ml-0"> {{trans('website.latest_news')}}</h5>
                                <div class="separator separator-dashed mt-6 mb-8"></div>

                                <div class="row">
                                    @if(isset($latest_news))
                                    @foreach($latest_news as $post)
                                    <div class="col-md-4 mb-15">
                                        <!--begin::Hot sales post-->
                                        <div class="card card-custom me-md-6">
                                            <!--begin::Overlay-->
                                            <a class="d-block" data-fslightbox="lightbox-hot-sales" href="#">
                                                <!--begin::Image-->
                                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover min-h-217px" style="background-image:url({{image($post->thumb)}})"></div>
                                                <!--end::Image-->
                                            </a>
                                            <!--end::Overlay-->
                                            <!--begin::Body-->
                                            <div class="mt-5">
                                                <!--begin::Title-->
                                                <a href="{{ $post->getFullSlug() }}" class="fs-4 fw-bolder text-hover-primary text-dark lh-base">{{ $post->translate(app()->getLocale())->title }}</a>
                                                <!--end::Title-->
                                                <!--begin::Text-->
                                                <div class="fw-bold fs-5 text-gray-600 mt-3">{!! $post->translate(app()->getLocale())->desc !!}</div>
                                                <!--end::Text-->
                                                <!--begin::Text-->
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
                                    @endforeach
                                    @endif()
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--end::Row-->
            <!--end::Dashboard-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
@endsection

<!--begin::