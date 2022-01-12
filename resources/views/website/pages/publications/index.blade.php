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
								<img src="{{image($section->icon)}}" class="align-self-end" alt="">
                            </span>
                            <a href="#" class="font-weight-bolder d-ib ml-1 section-title">{{strtoupper($model->title)}}</a>
                        </div>
                        <!--end::Separator-->
                        <!--begin::Row-->
                        <div class="row g-10">
                            <!--begin::Col-->
                            @if(isset($posts))
                            @foreach($posts as $post)
                            @if(isset($post->translate(app()->getLocale())->locale_additional['publications']['file']) && ($post->translate(app()->getLocale())->locale_additional['publications']['file'] != ''))
                            <div class="col-xl-4 col-lg-6 col-12 mb-15">
                                <div class="nav-item d-flex col-sm flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0" style="background-color: #EFEFF0; height: 195px;">
                                    <a class="nav-link border pt-4 d-flex flex-grow-1 rounded flex-column align-items-center" target="_blank" href="/uploads/files/{{$post->translate(app()->getLocale())->locale_additional['publications']['file']}}">
                                        <span class="nav-icon py-2 w-auto">
                                            <span class="icon-writing example-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
                                        </span>
                                        <span class="nav-text fs-18 py-5 text-center fnt-style">{{ $post->translate(app()->getLocale())->title }}</span>
                                    </a>
                                </div>
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
