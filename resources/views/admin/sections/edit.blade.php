@extends('admin.layouts.app')

@push('name')
{{ trans('admin.sections') }}
@endpush

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card-box">
            <h4 class="header-title mt-0 mb-3">{{ trans('admin.edit_section') }}</h4>

            <form action="/{{ app()->getLocale() }}/admin/sections/edit/{{ $section->id }}" method="post" enctype="multipart/form-data" novalidate>
                @csrf
                <ul class="nav nav-tabs">
                    @foreach (config('app.locales') as $locale)
                    <li class="nav-item ">
                        <a href="#locale-{{ $locale }}" data-toggle="tab" aria-expanded="false" class="nav-link @if($locale == app()->getLocale()) active @endif">
                            <span class="d-none d-sm-block">{{ trans('admin.locale_'.$locale) }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
                <div class="tab-content">
                    @foreach (config('app.locales') as $locale)
                    <div role="tabpanel" class="tab-pane fade @if($locale == app()->getLocale()) active show @endif " id="locale-{{ $locale }}">
                        <div class="form-group">
                            <label for="{{ $locale }}-title">{{ trans('admin.title') }}</label>
                            @error('name')
                            <small style="display:block; color:rgb(239, 83, 80)">{{ trans('admin.title_is_required') }}</small>
                            @enderror
                            <input type="text" name="{{ $locale }}[title]" value="{{ $section->translate($locale)->title ?? '' }}" parsley-trigger="change" class="@error('title') danger @enderror form-control" id="{{ $locale }}-title">
                        </div>
                        <div class="form-group">
                            <label for="{{ $locale }}-slug">{{ trans('admin.slug') }}</label>
                            @error('slug')
                            <small style="display:block; color:rgb(239, 83, 80)">{{ trans('admin.slug_is_required_and_must_be_unique') }}</small>
                            @enderror
                            <input type="text" name="{{ $locale }}[slug]" parsley-trigger="change" class="@error('slug') danger @enderror form-control" id="{{ $locale }}-slug" value="{{ $section->translate($locale)->slug ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="{{ $locale }}-desc">{{ trans('admin.desc') }}</label>
                            <textarea id="{{ $locale }}-desc" name="{{ $locale }}[desc]" class="form-control ckeditor">{{ $section->translate($locale)->desc ?? '' }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="{{ $locale }}-active">{{ trans('admin.active') }}</label>
                            @error('active')
                            <small style="display:block; color:rgb(239, 83, 80)">{{ trans('admin.title_is_required') }}</small>
                            @enderror
                            <br>
                            <input type="hidden" name="{{ $locale }}[active]" value="0" />

                            <input type="checkbox" name="{{ $locale }}[active]" id="{{ $locale }}-active" @if ($section->translate($locale) !== null) {{ $section->translate($locale)->active == 1 ? 'checked' : '' }} @endif value="1" data-plugin="switchery" data-color="#3bafda"/>


                        </div>


                    </div>
                    @endforeach
                    <div class="form-group">
                        <label for="file">{{trans('admin.file')}}</label>
                        <br>
                        <input type="file" name="file_type[]" value="file_types" multiple>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            @if($section->files != '')
                            @foreach($section->files as $file)
                            <div class="col-md-4 dfie d-flex">
                                <a style="margin-top: 10px; display: block;" href="{{ '/' . config('config.file_path') .  $file->file }}" download="{{$file->file}}">{{$file->file}}</a>

                                <span class="deletefile" data-id="{{$file->id}}" data-token="{{ csrf_token() }}"  data-route="/{{ app()->getLocale() }}/admin/sections/DeleteFiles/{{ $file->id }}">X</span>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <div style="padding-top:20px">
                    <div class="form-group">
                        <label for="type">{{ trans('admin.type') }}</label>
                        @error('active')
                        <small style="display:block; color:rgb(239, 83, 80)">{{ trans('admin.type_is_required') }}</small>
                        @enderror

                        <select class="form-control  @error('type') danger @enderror " name="type_id" id="typeselect">

                            @foreach ($sectionTypes as $key => $type)
                            <option value="{{ $type['id'] }}" {{ $type['id'] == $section->type_id ? "selected" : '' }}>{{ trans('sectionTypes.'.$key) }}</option>
                            @endforeach
                        </select>
                    </div>




                    <div class="form-group">
                        <label for="parent">{{ trans('admin.parent') }}</label>
                        <select class="form-control" name="parent_id" id="parent">

                            <option value="">{{ trans('admin.parent') }}</option>
                            @foreach ($sections as $key => $sec)
                            <option value="{{ $sec->id }}" {{ $sec->id == $section->parent_id ? "selected" : '' }}>{{ $sec->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    @foreach ( menuTypes() as $key => $menuType )

                    <div class="checkbox checkbox-primary">
                        <input type="checkbox" name="menu_types[]" @if (isMenuType($section, $menuType)) checked @endif id="type_{{ $key }}" value="{{ $key }}">
                        <label for="type_{{ $key }}">
                            {{ trans('menuTypes.'.$menuType) }}
                        </label>
                    </div>

                    @endforeach

                    <div class="checkbox checkbox-primary">
                        <input type="checkbox" name="admin_menu" id="type_admin_menu" value="1" @if($section->admin_menu == 1) checked @endif>
                        <label for="type_admin_menu">
                            {{ trans('admin.content') }}
                        </label>
                    </div>
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





