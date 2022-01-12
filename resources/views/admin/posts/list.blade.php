@extends('admin.layouts.app')

@push('name')
@endpush







@section('content')


<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div style="display: flex; align-items:center; justify-content: space-between; padding:20px 0">
                <h4 class="mt-0 header-title float-left">{{ trans('admin.sections') }}</h4>
                @if ($section->type_id ==10 && count($posts) > 0)
                    @else
                        <a  href="/{{ app()->getLocale() }}/admin/section/{{ $section->id }}/posts/create" type="button" class="float-right btn btn-info waves-effect width-md waves-light">{{ trans('admin.add_post') }}</a>
                @endif


            </div>

            <div class="container-fluid">

                <div class="row">
                </div>
              <!-- end row -->
              <div class="employees-table">
                            <table  id="datatable" class="table table-bordered dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th class="case_on">{{trans('website.name')}}</th>
                                        <th class="case_on">{{trans('website.images')}}</th>
                                        <th class="case_on">{{trans('website.description')}}</th>
                                        <th class="case_on">{{trans('website.text')}}</th>
                                        <th class="case_on">{{trans('website.edit')}}</th>
                                        <th class="case_on">{{trans('website.delete')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($posts as $key => $emp)

                                    <tr>
                                        <td>{{$emp[$defaultLocale = config('app.locale')]->title}}</td>

                                        <td>{{$emp->images}}
                                            <img class="img-thumbnail" src="/uploads/img/thumb/{{ $emp->thumb }}" alt="Card image cap" style="max-width: 200px; height:100px; width:100%;">
                                        </td>
                                        <td>{!! $emp[$defaultLocale = config('app.locale')]->desc !!}</td>
                                        <td>{!! $emp[$defaultLocale = config('app.locale')]->text !!}</td>
                                        <td>{{$emp->edit}}

                                        <a href="{{ route('post.edit', [app()->getLocale(), $emp->id]) }}" type="button" class="btn btn-info waves-effect width-md waves-light">{{ trans('admin.edit') }}</a>
                                        </td>
                                        <td>{{$emp->delete}}
                                        <a  style="color: #ff3535" href="{{ route('post.destroy', [app()->getLocale(), $emp->id]) }}" type="button" data-confirm="დარწმუნებული ხართ რომ გსურთ პოსტის წაშლა?" class="dropdown-item delete">{{ trans('admin.delete') }}</a>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

    
                        </div>
          </div>
        </div>
    </div>
</div>


@push('styles')
    <!-- third party css -->
        <link href="{{ asset('/admin/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/admin/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/admin/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/admin/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <!-- third party css end -->
@endpush

@push('scripts')
    <!-- third party js -->
    <script src="{{ asset('/admin/libs/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/admin/libs/datatables/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('/admin/libs/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('/admin/libs/datatables/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/admin/libs/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('/admin/libs/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/admin/libs/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('/admin/libs/datatables/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('/admin/libs/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('/admin/libs/datatables/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('/admin/libs/datatables/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('/admin/libs/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('/admin/libs/pdfmake/vfs_fonts.js') }}"></script>
    <!-- third party js ends -->
    <!-- Datatables init -->
    <script src="{{ asset('/admin/js/pages/datatables.init.js') }}"></script>
@endpush








<script>
    var deleteLinks = document.querySelectorAll('.delete');

  for (var i = 0; i < deleteLinks.length; i++) {
      deleteLinks[i].addEventListener('click', function(event) {
          event.preventDefault();

          var choice = confirm(this.getAttribute('data-confirm'));

          if (choice) {
              window.location.href = this.getAttribute('href');
          }
      });
  }
  </script>
@endsection

