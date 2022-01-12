<div class="form-group">
    <label data-icon="-">{{ trans('admin.'.$key) }}</label> <br>
	@if(isset($post) && isset($post->translate($locale)->{$key}['file']))
	<input type="hidden" name="{{ $locale }}[{{ $key }}]['file']" value="{{$post->translate($locale)->{$key}['file']}}">
	<input type="hidden" name="{{ $locale }}[{{ $key }}]['name']" value="{{ $post->translate($locale)->{$key}['name']}}">
	@endif
    <input type="file" name="{{ $locale }}[file][{{ $key }}]" @if(isset($post) && isset($post->translate($locale)->{$key}['file'])) value="{{$post->translate($locale)->{$key}['file'] }}" @endif>
	
	@if(isset($post) && isset($post->translate($locale)->{$key}))
	<br>
	<a style="margin-top: 10px; display: block;" href="/{{config('config.file_path').$post->translate($locale)->{$key}['file']}}" download="{{$post->translate($locale)->{$key}['name']}}">{{$post->translate($locale)->{$key}['name']}}</a>
	
	
	@endif
</div> 