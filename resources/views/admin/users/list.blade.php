@extends('admin.layouts.app')

@push('name')
    {{ trans('admin.users') }}
@endpush



@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div style="display: flex; align-items:center; justify-content: space-between; padding:20px 0">
                <h4 class="mt-0 header-title float-left">{{ trans('admin.users') }}</h4>

                <a  href="/{{ app()->getLocale() }}/admin/users/add" type="button" class="float-right btn btn-info waves-effect width-md waves-light">{{ trans('admin.add_user') }}</a>

            </div>

            <table id="datatable" class="table table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>{{ trans('admin.name') }}</th>
                        <th>{{ trans('admin.email') }}</th>
                        <th>{{ trans('admin.type') }}</th>
                        <th>{{ trans('admin.create_date') }}</th>
                        <th>{{ trans('admin.update_date') }}</th>
                        <th>{{ trans('admin.login_logs') }}</th>
                        <th>{{ trans('admin.edit') }}</th>
                        <th>{{ trans('admin.delete') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $kay => $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ trans('admin.'.$user->type ) }}</td>
                            <td>{{ $user->created_at->format('d.m.Y H:i') }}</td>
                            <td>{{ $user->updated_at->format('d.m.Y H:i') }}</td>
                            <td><a href="/{{ app()->getLocale() }}/admin/users/logs/{{ $user->id }}" type="button" class="btn btn-info waves-effect width-md waves-light">{{ trans('admin.show_logs') }}</a></td>
                            <td><a href="/{{ app()->getLocale() }}/admin/users/edit/{{ $user->id }}" type="button" class="btn btn-info waves-effect width-md waves-light">{{ trans('admin.edit') }}</a></td>
                            <td><a href="/{{ app()->getLocale() }}/admin/users/destroy/{{ $user->id }}" type="button" onclick="return confirm('დარწმნებლი ხართ რომ გსურთ მომხმარებლის წაშლა ?');" class="@if($user->id == auth()->user()->id) disabled @endif btn btn-danger waves-effect width-md waves-light">{{ trans('admin.delete') }}</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

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
