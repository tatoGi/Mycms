<!DOCTYPE html>
<html lang="en">

@include('admin.layouts.head')

    <body>

        <!-- Begin page -->
        <div id="wrapper">



            @include('admin.layouts.sidebar')
            @include('admin.layouts.asidebar')
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            @include('admin.layouts.header')
            <div class="d-flex flex-column flex-row-fluid wrapper col-xl-9 col-md-9 col-sm-9 col-9" id="kt_wrapper" >

                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        @yield('content')


                    </div>
                    <!-- container -->

                </div> <!-- content -->


            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->


        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        @include('admin.layouts.scripts')

    </body>
</html>
