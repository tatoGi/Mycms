@extends('website.layout')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                <li class="breadcrumb-item text-muted">
                    <a href="{{URL::to('/')}}" class="text-muted">{{trans('website.main')}}</a>
                </li>
                <li class="breadcrumb-item text-muted">
                    <a href="{{$model->url}}" class="text-muted">{{strtoupper($model->title)}}</a>
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
                                <img src="{{image($model->icon)}}" class="align-self-end" alt="">
                            </span>
                            <a href="#" class="font-weight-bolder d-ib ml-1 section-title">{{strtoupper($model->title)}}</a>
                        </div>
                        <!--end::Separator-->
                        <!--begin::Row-->
                        <div class="row g-10">

                            <!--begin::Col-->
                            @if(isset($submenu_sections))
                            @foreach($submenu_sections as $post)

                            <div class="col-xl-4 col-lg-6 col-12">
                                <!--begin::Stats Widget 13-->
                                <a href="{{ $post->getFullSlug() }}" class="card card-custom card-stretch gutter-b submenu-card pb-0">
                                    <!--begin::Body-->
                                    <div class="submenu-square">
                                        <div class="d-flex align-items-center flex-start mb-64 submenu-pad">
                                            <span class="yellow-brick"></span>
                                            <div class="submenu-card-title">{{ $post->translate(app()->getLocale())->title }}</div>
                                        </div>

                                        <div class="card-img submenu-cover">
                                            <img src="{{asset('../website/media/decor.png')}}" alt="">
                                        </div>
                                    </div>
                                    <!--end::Body-->
                                </a>
                                <!--end::Stats Widget 13-->
                            </div>
                            @endforeach
                            @endif
                            <!--end::Col-->
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
</div>
@endsection