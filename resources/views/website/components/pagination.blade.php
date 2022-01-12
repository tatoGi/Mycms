@if ($paginator->hasPages())
<!--begin::Pagination-->
<div class="d-flex justify-content-between align-items-center flex-wrap mt-0">
	<div class="d-flex flex-wrap py-2 mr-3">
	</div>
	<div class="d-flex align-items-center py-3 index-pagination">
		<a href="{{ $paginator->previousPageUrl() }}" class="btn btn-icon btn-sm mr-2 my-1 prev"><i class="icon-down"></i></a>


		@foreach ($elements as $element)
		@if (is_array($element))
		@foreach ($element as $page => $url)
		<a href="{{$url}}" class="btn btn-icon btn-sm border-0 mr-2 my-1 @if($paginator->currentPage() == $page) btn-hover-primary active @endif">{{$page}}</a>
		@endforeach
		@endif
		@endforeach

		<a href="{{ $paginator->nextPageUrl() }}" class="btn btn-icon btn-sm mr-2 my-1 next"><i class="icon-down"></i></a>
	</div>
</div>
@endif
