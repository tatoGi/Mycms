<div class="form-group">
	{{ Form::label(trans('admin.'.$key), null, ['class' => 'control-label']) }}
	
	
	<select name="{{ $key }}" class="form-control select2" id="">
		@foreach (getCountries() as $country)
			<option value="{{ $country['code'] }}"  @if(isset($post) && $post->{$key} == $country['code']) selected @endif>{{$country['name']}}[{{$country['code']}}]</option>
			@if($country['states'] !== null)ა
				@foreach ($country['states'] as $state)
					<option value="{{ $state['code'] }}" @if(isset($post) && $post->{$key} == $state['code']) selected @endif>{{$state['name']}}[{{$state['code']}}] ({{ $country['name'] }})</option>
				@endforeach
			@endif
		@endforeach
	</select>
</div>
