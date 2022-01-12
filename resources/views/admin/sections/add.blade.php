@extends('admin.layouts.app')

@push('name')
{{ trans('admin.sections') }}
@endpush

@section('content')
<form action="/{{ app()->getLocale() }}/admin/sections/create" method="post" enctype="multipart/form-data"
    data-parsley-validate novalidate>
    @csrf
    <div class="card card-custom card-sticky" id="kt_page_sticky_card">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">

                    <i class="mr-2"> {{ trans('admin.add_section') }}</i>

            </div>
            <div class="card-toolbar">

                    <a href="/{{ app()->getLocale() }}/admin/sections" class="btn btn-light-primary font-weight-bolder mr-2">
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


    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">

                    <div class="col-xl-12">
                        <ul class="nav nav-tabs nav-tabs-line">
                            @foreach (config('app.locales') as $locale)
                            <li class="nav-item ">
                                <a href="#locale-{{ $locale }}" data-toggle="tab" aria-expanded="false" class="nav-link @if($locale == app()->getLocale()) active @endif">
                                    <span class="d-none d-sm-block">{{ trans('admin.locale_'.$locale) }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        <div class="tab-content mt-5" id="myTabContent">
                         @foreach (config('app.locales') as $locale)
                        <div role="tabpanel" class="tab-pane fade @if($locale == app()->getLocale()) active show @endif " id="locale-{{ $locale }}">
                            <div class="tab-content mt-5" id="myTabContent"></div>
                                <div class="form-group">
                                    <label  for="{{ $locale }}-title">{{ trans('admin.title') }} </label>
                                    @error('name')
                                    <small style="display:block; color:rgb(239, 83, 80)">{{ trans('admin.title_is_required') }}</small>
                                    @enderror
                                    <input type="text" name="{{ $locale }}[title]" parsley-trigger="change" class="@error('title')   @enderror form-control  is-invalid" id="{{ $locale }}_title">
                                </div>

                                <div class="form-group">
                                    <label for="{{ $locale }}-slug">{{ trans('admin.slug') }}</label>
                                    @error('slug')
                                    <small style="display:block; color:rgb(239, 83, 80)">{{ trans('admin.slug_is_required_and_must_be_unique') }}</small>
                                    @enderror
                                    <input type="text" name="{{ $locale }}[slug]" parsley-trigger="change" class="@error('slug') @enderror form-control  is-invalid" id="{{ $locale }}-slug">
                              </div>

                            <div class="card card-custom">

                                <!--begin::Form-->
                                <form>
                                    <div class="card-bodys">
                                        <div class="form-group row">
                                            <div
                                                class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="summernote"
                                                    id="kt_summernote_1">
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </form>
                            </div>


                                <div class="form-group row">
                                    <div class="col-3">
                                        <span class="switch switch-success">
                                            <label  for="{{ $locale }}-active">

                                                <input  name="{{ $locale }}[active]" id="{{ $locale }}_active" value="1" type="checkbox" checked="checked"  />
                                                <span></span>
                                            </label>
                                        </span>
                                    </div>
                                </div>
                                    <!--end::Form-->
                                </div>
                                @endforeach
                                <div class="card-bodys">
                                    <div class="row">
                                        <div class="form-group col-xl-6 col-md-6 col-sm-6 col-6">
                                            <label for="parent">{{ trans('admin.parent') }}</label>
                                            <div class=" table-forms">
                                                <select class="form-control" name="parent_id" id="parent">
                                                    <option value="">{{ trans('admin.parent') }}</option>
                                                    @foreach ($sections as $key => $sec)
                                                    <option value="{{ $sec->id }}">{{ $sec->title }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-xl-6 col-md-6 col-sm-6 col-6">

                                            <div class=" type-forms">
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

                                    </div>


                                </div>

                                <div class="form-group validated">
                                    @foreach ( menuTypes() as $key => $menuType )
                                    <div class="checkbox checkbox-primary switch switch-success">
                                        <input  type="checkbox" checked="checked" name="menu_types[]" id="type_{{ $key }}" value="{{ $key }}">
                                        <label class="checkbox " for="type_{{ $key }}" >
                                            {{ trans('menuTypes.'.$menuType) }}
                                        </label>
                                    </div>
                                    @endforeach

                                    <div class="checkbox checkbox-primary switch switch-success">
                                        <input type="checkbox" name="admin_menu" id="type_admin_menu" value="1">
                                        <label class="checkbox " for="type_admin_menu">
                                            {{ trans('admin.content') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                                        <div class="form-group" style="display:inline-block">
                                            <label class="col-form-label" for="file">{{trans('admin.file')}}</label>

                                            <div class="dropzone dropzone-multi" id="kt_dropzone_4" >

                                                <div class="dropzone-panel mb-lg-0 mb-2">
                                                    <a
                                                        class="dropzone-select btn btn-light-primary font-weight-bold btn-sm">Attach
                                                        files</a>
                                                    <a
                                                        class="dropzone-upload btn btn-light-primary font-weight-bold btn-sm">Upload
                                                        All</a>
                                                    <a
                                                        class="dropzone-remove-all btn btn-light-primary font-weight-bold btn-sm">Remove
                                                        All</a>
                                                </div>
                                                <div class="dropzone-items">
                                                    <div class="dropzone-item" style="display:none">
                                                        <div class="dropzone-file">
                                                            <div class="dropzone-filename" title="some_image_file_name.jpg">
                                                                <span data-dz-name="">some_image_file_name.jpg</span>
                                                                <strong>(
                                                                    <span data-dz-size="">340kb</span>)</strong>
                                                            </div>
                                                            <div class="dropzone-error" data-dz-errormessage=""></div>
                                                        </div>
                                                        <div class="dropzone-progress">
                                                            <div class="progress">
                                                                <div class="progress-bar bg-primary" role="progressbar"
                                                                    aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"
                                                                    data-dz-uploadprogress=""></div>
                                                            </div>

                                                        </div>
                                                        <div class="dropzone-toolbar">
                                                            <span class="dropzone-start">
                                                                <i class="flaticon2-arrow"></i>
                                                            </span>
                                                            <span class="dropzone-cancel" data-dz-remove=""
                                                                style="display: none;">
                                                                <i class="flaticon2-cross"></i>
                                                            </span>
                                                            <span class="dropzone-delete" data-dz-remove="">
                                                                <i class="flaticon2-cross"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-sm6 col-6">
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-6 col-sm-12 text-lg-right">სურათები</label>
                                            <div class="col-lg-9 col-md-9 col-sm-12">
                                                <div class="dropzone dropzone-default dropzone-primary" id="kt_dropzone_2">
                                                    <div class="dropzone-msg dz-message needsclick">
                                                        <h3 class="dropzone-msg-title">Drop files here .</h3>
                                                        <span class="dropzone-msg-desc"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            </form>


                        </div>




                    </div>
                </div>


                <!--end::Card-->
            </div>





        </div>
        <!--end::Row-->

    </div>
</form>


@endsection

