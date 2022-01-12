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
                @foreach($breadcrumbs as $key => $crumb)
                <li class="breadcrumb-item text-muted">
                    <a href="{{$crumb['url']}}" class="text-muted">{{$crumb['name']}}</a>
                </li>
                @endforeach
                <li class="breadcrumb-item text-muted">
                    <p class="mt-15">{{ $post->translate(app()->getLocale())->title }}</p>
                </li>
            </ul>
                    <div class="separator separator-dashed mb-9"></div>
        <!--begin::Dashboard-->
        <!--begin::Row-->
        <div class="row mt-0 mt-lg-8">
            <div class="col-xl-12">
                <div class="mb-17">
                    <!--begin::Separator-->
                        <!--begin::Col-->
                        <span class="icon-square title-logo-size">
                            <img src="{{image($section->icon)}}" class="align-self-end" alt="">
                        </span>
                        <h5 class="text-dark font-weight-bold my-1 mr-5 text-page-title">{{strtoupper($section->title)}}</h5>
                        <div class="text-dark-50 line-height-lg mb-8 mt-2 fs-14">
                            <h4 class="font-weight-bold text-gray mb-4 mt-4 fs-18 up medium">{{ $post->translate(app()->getLocale())->title }}</h4>
                            <span class="d-block mb-4 green-title fs-16">{{getDates($post->date)}}</span>
                            <p>{!! $post->translate(app()->getLocale())->text !!}</p>

                            <div class="d-flex flex-column-fluid">
                                <!--begin::Container-->
                                <div class="container-fluid" style="padding: 4px 0 30px 0;">
                                    <!--begin::Row-->
                                    <div class="row">
                                        <!--begin::Col-->
                                        @foreach($post->files as $files)
                                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                            <div class="inner-gallery">
                                                <a href="#">
                                                    <img src="{{image($files->file)}}" class="align-self-end" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                                <!--end::Container-->
                            </div>
                            <h5 class="text-dark text-page-title mt-4 ml-0"> {{trans('website.latest_news')}}</h5>
                            <div class="separator separator-dashed mt-6 mb-8"></div>
                            <div class="row">
                                @if(isset($latest_news))
                                @foreach($latest_news as $post)
                                @if($post->translate(app()->getLocale()) != '')

                                <div class="col-xxl-4 col-xl-6 col-lg-12">
                                    <!--begin::Hot sales post-->
                                    <div class="card card-custom me-md-6 mb-12">

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
                                @endif
                                @endforeach
                                @endif
                            </div>
                        </div>
                    <!--end::Separator-->

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
