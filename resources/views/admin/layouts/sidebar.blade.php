<div class="aside aside-left d-flex flex-column" id="kt_aside">
    <!--begin::Nav Wrapper-->
    <div class="aside-nav d-flex flex-column align-items-center flex-column-fluid pb-10">
        <!--begin::Nav-->
        <ul class="nav flex-column">

            <!--begin::Item-->
            <li class="nav-item mb-2" data-toggle="tooltip" data-placement="right"
                data-container="body" data-boundary="window" title="{{ trans('admin.my_account') }}">
                <a href="/{{ app()->getLocale() }}/admin/profile" class="nav-link btn btn-icon btn-lg  active">
                    <span class="svg-icon svg-icon-xxl">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->

                        <img src=" {{asset ('admin/assets/media/users/male48.png') }}" alt="admin">
                        <!--end::Svg Icon-->
                    </span>
                </a>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            @if (auth()->user()->isType('superuser'))
            <li class="nav-item mb-2" {{ trans('admin.cms') }} data-toggle="tooltip" data-placement="right"
                data-container="body" data-boundary="window" title="{{ trans('admin.users') }}">
                <a href="/{{ app()->getLocale() }}/admin/users" class="nav-link btn btn-icon btn-lg    active"
                   >
                    <span class="svg-icon svg-icon-xxl">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none"
                                fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24" />
                                <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                    fill="#000000" fill-rule="nonzero"
                                    opacity="0.3" />
                                <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                    fill="#000000" fill-rule="nonzero" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                </a>
            </li>
            <li class="nav-item mb-2" data-toggle="tooltip" data-placement="right"
                data-container="body" data-boundary="window" title=" {{ trans('admin.attandance') }}">
                <a href="/{{ app()->getLocale() }}/attandance" class="nav-link btn btn-icon btn-lg active"
                   >
                    <span class="svg-icon svg-icon-xxl">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/Shield-check.svg-->
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <!--end::Svg Icon-->
                    </span>
                </a>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="nav-item mb-2" data-toggle="tooltip" data-placement="right"
                data-container="body" data-boundary="window" title="{{ trans('admin.employes') }}">
                <a href="/{{ app()->getLocale() }}/employes" class="nav-link btn btn-icon btn-lg active "
                    >
                    <span class="svg-icon svg-icon-xxl">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <!--end::Svg Icon-->
                    </span>
                </a>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="nav-item mb-2" data-toggle="tooltip" data-placement="right"
            data-container="body" data-boundary="window" title="{{ trans('admin.settings') }}">
            <a href="/{{ app()->getLocale() }}/admin/settings/edit" class="nav-link btn btn-icon btn-lg active "
               >
                <span class="svg-icon svg-icon-xxl">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Files/File-plus.svg-->
                    <i class="fa fa-gear fa-spin" style="font-size:24px"></i>
                    <!--end::Svg Icon-->
                </span>
            </a>
        </li>
            <!--end::Item-->
            <!--begin::Item-->

            @endif
            <!--end::Item-->
            <!--begin::Item-->

            <!--end::Item-->
        </ul>
        <!--end::Nav-->
    </div>
    <!--end::Nav Wrapper-->
    <!--begin::Footer-->
    <div class="aside-footer d-flex flex-column align-items-center flex-column-auto py-8">
        <!--begin::Notifications-->
        <a href="/{{ app()->getLocale() }}/admin/submission" class="btn btn-icon btn-lg  mb-1 position-relative"
            id="kt_quick_notifications_toggle" data-toggle="tooltip" data-placement="right"
            title="   {{ trans('admin.notifications') }}">

            <span class="svg-icon svg-icon-xxl">
                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                <svg xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                    viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24" />
                        <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                            fill="#000000" fill-rule="nonzero" />
                        <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                            fill="#000000" opacity="0.3" />
                    </g>
                </svg>
                <!--end::Svg Icon-->
            </span>
            <span
                class="label label-sm label-light-danger label-rounded font-weight-bolder position-absolute top-0 right-0 mt-1 mr-1">3</span>
        </a>

        <!--begin::Languages-->
        <div class="dropdown" data-toggle="tooltip" data-placement="right" data-container="body"
            data-boundary="window" title=" {{ trans('admin.languages') }}">
            <a href="#" class="btn btn-icon btn-lg btn-borderless" data-toggle="dropdown"
                data-offset="0px,0px">
                <img class="w-20px h-20px rounded"

                    src=" {{asset ('admin/assets/media/svg/flags/226-united-states.svg') }}" alt="image" />
            </a>
            <!--begin::Dropdown-->
            <div
                class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-left">
                <!--begin::Nav-->
                <ul class="navi navi-hover py-4">
                    <li class="leng">
                        <div class="language-text">
                            @foreach(Config::get('app.locales') as $locale)
                     <a class="active" title="GEO" href="@if(app()->getLocale() != $locale) /{{ $locale }}/admin @endif" >@if(app()->getLocale() != $locale) {{$locale}} @endif</a>
         
                     @endforeach
                 </div>
                     </li>
                </ul>
                <!--end::Nav-->
            </div>
            <!--end::Dropdown-->
        </div>
        <!--end::Languages-->

    </div>
    <!--end::Footer-->
</div>
