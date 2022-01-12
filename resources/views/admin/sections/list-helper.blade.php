
    <!--begin::Entry-->
    <div class="card-box">

        <div class="dd section-list">

        <ol class="dd-list">
            @foreach ($sections as $section)
            <li class="dd-item @if (count($section->children) > 0 ) acordion @endif" data-id="{{ $section->id }}">
                <div class="dd-handle" >
                    {{ $section->title }}
                </div>
                <div class="change-icons">
                    @if ( isset($section->type['type']) && ($section->type['type'] !== 0) )
                    @if ($section->post() !== null && count($section->post()->submissions) > 0)

                    <a href="/{{ app()->getLocale() }}/admin/submissions?post_id={{ $section->post()->id }}"
                        class="far fa-envelope"></a>
                    @endif
                    <a href="/{{ app()->getLocale() }}/admin/section/{{ $section->id }}/posts/" class="far fa-eye"></a>
                    @endif
                    @if (auth()->user()->isType('admin'))
                    <a href="/{{ app()->getLocale() }}/admin/sections/edit/{{ $section->id }}" class="fas fa-pencil-alt"></a>
                    <a href="/{{ app()->getLocale() }}/admin/sections/destroy/{{ $section->id }}" onclick="return confirm('დარწმნებლი ხართ რომ გსურთ სექციის წაშლა ?');" class="fas fa-trash-alt"></a>
                @endif
                    {{-- @if (count($section->children) > 0 ) <span class="button_je mdi mdi-chevron-down arrow"></span> @endif --}}
                </div>
                @if (count($section->children) > 0 )
                @include('admin.sections.list-helper', ['sections' => $section->children])
                @endif
            </li>
            @endforeach
  </ol>



        </div>


    </div>
    <!--end::Entry-->
</div>


@push ('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script>
$('#confirm-delete').on('show.bs.modal', function (e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});
$(".button_je").on('click', function () {
  var parent_li = $(this).parent().parent();
  parent_li.toggleClass('opened');
});
$(".button_je").on('click', function () {
  $(this).toggleClass('rotate');
});
</script>
@endpush
