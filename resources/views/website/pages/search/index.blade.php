@extends('website.layout')

@section('content')

<div class="search w-100">
    <div class="results">
        
        <div class="col-md-12 mb-15">
            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                <li class="breadcrumb-item text-muted">
                    <a href="{{URL::to('/')}}" class="text-muted">{{trans('website.main')}}</a>
                </li>
                <li class="breadcrumb-item text-muted">
                    <a href="/{{app()->getLocale()}}/search" class="text-muted">{{trans('website.search')}}</a>
                </li>
            </ul>
            <div class="separator separator-dashed mb-9"></div>
            @foreach ($posts as $item)
            <div class="nav-item col-sm mr-3 mb-3 mb-10 fs-18" style="background-color: #EFEFF0; height: 195px;border: solid 1px #6B6B6B; padding-left: 50px;">
                <div class="w-100">
                    <a class="nav-link border py-50 pl-0" href="{{$item->getfullslug()}}">{{ $item->translate(app()->getLocale())->title ?? $item->parent->translate(app()->getLocale())->title }}</a>
                </div>
                <div class="w-100">
                    <span class="nav-text font-size-lg py-5 sp-font">{!! ($item->translate(app()->getLocale())->desc ?? $item->translate(app()->getLocale())->text) ?? $item->parent->translate(app()->getLocale())->desc !!}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection