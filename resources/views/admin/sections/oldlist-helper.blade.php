
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

  {{-- <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5><strong>ნამდვილად გსურთ სექციის წაშლა ?</strong></h5>
            </div>
            <div class="modal-footer">

                <button type="button" style="border:none; background-color:transparent; color:blue"
                    data-dismiss="modal">გაუქმება</button>

                <a href="/{{ app()->getLocale() }}/admin/sections/destroy/{{ $section->id }}" style="color: red">
                    დადასტურება
                </a>
            </div>
        </div>
    </div>
  </div> --}}
  {{--
  @if (count($section->children) > 0 )
  <style>
  .acordion{
    height: 57px;
    overflow: hidden;
  }
  .opened{
    height: initial;
  }
  .arrow{
    display: inline-block;
    transform: rotate(-90deg);
    font-size: 34px;
    position: relative;
    top: 8px;
    cursor: pointer;
  }
  .rotate{
    transform: rotate(0deg);
    display: inline-block
  }
  </style>
  @endif --}}
 
