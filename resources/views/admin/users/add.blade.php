@extends('admin.layouts.app')

@push('name')
    {{ trans('admin.users') }}
@endpush

@section('content')
<form action="/{{ app()->getLocale() }}/admin/users/add" method="post" data-parsley-validate novalidate>
    @csrf
<div class="card card-custom card-sticky" id="kt_page_sticky_card">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">

                <i class="mr-2">{{ trans('admin.add_user') }}</i>

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

<div class="row">
    <div class="col-xl-12">
        <div class="card-box">
            

            <h4 class="header-title mt-0 mb-3">{{ trans('admin.add_user') }}</h4>

          
                <div class="form-group">
                    <label for="userName">{{ trans('admin.username') }}</label>
                    @error('name')
                        <small style="display:block; color:rgb(239, 83, 80)">{{ trans('admin.username_is_required') }}</small>
                    @enderror
                    <input type="text" name="name" parsley-trigger="change" required
                           placeholder="Enter user name" class="@error('name') danger @enderror form-control" id="userName">
                </div>
                <div class="form-group">
                    <label for="emailAddress">{{ trans('admin.email') }}</label>
                    @error('email')
                        <small style="display:block; color:rgb(239, 83, 80)">{{ trans('admin.email_is_required_and_must_be_unique') }}</small>
                    @enderror
                    <input type="email" name="email" parsley-trigger="change" required
                           placeholder="Enter email" class="@error('email') danger @enderror form-control" id="emailAddress">
                </div>
                <div class="form-group">
                    <h5>{{ trans('admin.type') }}</h5>
                    @error('type_id')
                        <small style="display:block; color:rgb(239, 83, 80)">{{ trans('admin.type_is_required') }}</small>
                    @enderror

                    <select class="form-control select2 @error('type_id') danger @enderror " name="type_id">
                        @foreach ($user_types as $key => $type)
                            <option value="{{ $key }}">{{ trans('admin.'.$type) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="pass1">{{ trans('admin.password') }}</label>
                    @error('password')
                        <small style="display:block; color:rgb(239, 83, 80)">{{ trans('admin.password_is_required_min_8_characters') }}</small>
                    @enderror
                    <input id="pass1" type="password" placeholder="Password" 
                           class="form-control @error('password') danger @enderror" name="password" required>
                </div>
                <div class="form-group">
                    <label for="passWord2">{{ trans('admin.re_password') }}</label>
                    @error('re_password')
                        <small style="display:block; color:rgb(239, 83, 80)">{{ trans('admin.re_password_must_be_same_as_password') }}</small>
                    @enderror
                    <input data-parsley-equalto="#pass1" type="password" 
                           placeholder="Password" name="re_password" class="form-control @error('re_password') danger @enderror" id="passWord2" required>
                </div>
                

               

            </form>
        </div>
    </div>
</div>
@endsection

@push('styles')
    <link href="{{ asset('/admin/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />    

    <style>
        .danger{
            border: 1px solid rgb(239, 83, 80) !important;
        }
    </style>
@endpush

@push('scripts')
    !-- Validation js (Parsleyjs) -->
    <script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>

    <!-- validation init -->
    <script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script>
@endpush