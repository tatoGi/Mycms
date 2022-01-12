@extends('admin.layouts.app')

@push('name')
{{ trans('admin.sections') }}
@endpush

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card-box">
            <h4 class="header-title mt-0 mb-3">{{ trans('admin.add_section') }}</h4>

            <form action="/{{ app()->getLocale() }}/admin/sections/create" method="post" enctype="multipart/form-data" data-parsley-validate novalidate>
                @csrf
                <div class="card card-custom card-sticky" id="kt_page_sticky_card">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">
                                <i class="mr-2"></i>

                        </div>

                            <div class="card-toolbar">
                                <a href="#" class="btn btn-light-primary font-weight-bolder mr-2">
                                    <i class="ki ki-long-arrow-back icon-sm"></i>Back</a>
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-primary font-weight-bolder">
                                        <i class="ki ki-check icon-sm"></i> {{ trans('admin.save') }}</button>
                                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                        <ul class="nav nav-hover flex-column">
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    <i class="nav-icon flaticon2-reload"></i>
                                                    <span class="nav-text">Save &amp; continue</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    <i class="nav-icon flaticon2-add-1"></i>
                                                    <span class="nav-text">Save &amp; add new</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    <i class="nav-icon flaticon2-power"></i>
                                                    <span class="nav-text">Save &amp; exit</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <ul class="nav nav-tabs">

                    @foreach (config('app.locales') as $locale)
                    <li class="nav-item ">
                        <a href="#locale-{{ $locale }}" data-toggle="tab" aria-expanded="false" class="nav-link @if($locale == app()->getLocale()) active @endif">
                            <span class="d-none d-sm-block">{{ trans('admin.locale_'.$locale) }}</span>
                        </a>
                    </li>
                    @endforeach

                </ul>
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    @foreach (config('app.locales') as $locale)
                    <div role="tabpanel" class="tab-pane fade @if($locale == app()->getLocale()) active show @endif " id="locale-{{ $locale }}">
                    <div class="tab-content mt-5" id="myTabContent"></div>
                        <div class="form-group">
                            <label for="{{ $locale }}-title">{{ trans('admin.title') }}</label>
                            @error('name')
                            <small style="display:block; color:rgb(239, 83, 80)">{{ trans('admin.title_is_required') }}</small>
                            @enderror
                            <input type="text" name="{{ $locale }}[title]" parsley-trigger="change" class="@error('title') danger @enderror form-control" id="{{ $locale }}_title">
                        </div>

                        <div class="form-group">
                            <label for="{{ $locale }}-slug">{{ trans('admin.slug') }}</label>
                            @error('slug')
                            <small style="display:block; color:rgb(239, 83, 80)">{{ trans('admin.slug_is_required_and_must_be_unique') }}</small>
                            @enderror
                            <input type="text" name="{{ $locale }}[slug]" parsley-trigger="change" class="@error('slug') danger @enderror form-control" id="{{ $locale }}-slug">
                        </div>

                        <div class="form-group">
                            <label for="{{ $locale }}-desc">{{ trans('admin.desc') }}</label>
                            <textarea id="{{ $locale }}-desc" name="{{ $locale }}[desc]" class="form-control ckeditor"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="{{ $locale }}-active">{{ trans('admin.active') }}</label>
                            @error('active')
                            <small style="display:block; color:rgb(239, 83, 80)">{{ trans('admin.title_is_required') }}</small>
                            @enderror
                            <br>
                            <input type="checkbox" name="{{ $locale }}[active]" id="{{ $locale }}_active" value="1" data-plugin="switchery" data-color="#3bafda" />
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row" style="padding-top: 50px;">
                    <div class="col-xxl-6 col-md-6 col-6">
                        <div class="form-group">
                            <label for="type">{{ trans('admin.type') }}</label>
                            @error('active')
                            <small style="display:block; color:rgb(239, 83, 80)">{{ trans('admin.type_is_required') }}</small>
                            @enderror
                            <select class="form-control  @error('type') danger @enderror " name="type_id" id="typeselect">

                                @foreach ($sectionTypes as $key => $type)
                                <option value="{{ $type['id'] }}" id="{{ $type['id'] }}">{{ trans('sectionTypes.'.$key) }}</option>

                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-md-6 col-6">
                        <div class="form-group">
                            <label for="parent">{{ trans('admin.parent') }}</label>
                            <select class="form-control" name="parent_id" id="parent">
                                <option value="">{{ trans('admin.parent') }}</option>
                                @foreach ($sections as $key => $sec)
                                <option value="{{ $sec->id }}">{{ $sec->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    @foreach ( menuTypes() as $key => $menuType )
                    <div class="checkbox checkbox-primary">
                        <input type="checkbox" name="menu_types[]" id="type_{{ $key }}" value="{{ $key }}">
                        <label for="type_{{ $key }}">
                            {{ trans('menuTypes.'.$menuType) }}
                        </label>
                    </div>
                    @endforeach

                    <div class="checkbox checkbox-primary">
                        <input type="checkbox" name="admin_menu" id="type_admin_menu" value="1">
                        <label for="type_admin_menu">
                            {{ trans('admin.content') }}
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="file">{{trans('admin.file')}}</label>
                    <br>
                    <input type="file" name="file_type[]" value="file_types" multiple>
                </div>

                <div class="form-group text-right mb-0">
                    <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                        {{ trans('admin.save') }}
                    </button>
                </div>


            </form>
        </div>
    </div>
</div>
@endsection
