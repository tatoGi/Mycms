
@if (isset($settings))
<div class="card card-custom card-sticky" id="kt_page_sticky_card">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">

                <i class="mr-2"> {{ trans('admin.edit_settings') }}</i>

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
<ul class="nav nav-tabs">
        
    @foreach ($settings as $k => $setting)
    <li class="nav-item ">
        <a href="#setting-{{ $k }}" data-toggle="tab" aria-expanded="false" class="nav-link @if($loop->first) active @endif">
            <span class="d-none d-sm-block">{{ trans('admin.'.$k) }}</span>            
        </a>
    </li>
    @endforeach
</ul>
    
	<div class="tab-content">
		@foreach ($settings as $k => $setting)
    
		<div role="tabpanel" class="tab-pane fade @if($loop->first) active show @endif " id="#setting-{{ $k }}">
			
				<ul class="nav nav-tabs">
				
					@foreach (config('app.locales') as $locale)
					<li class="nav-item ">
						<a href="#locale-{{ $locale }}" data-toggle="tab" aria-expanded="false" class="nav-link @if($locale == app()->getLocale()) active @endif">
							<span class="d-none d-sm-block">{{ trans('admin.locale_'.$locale) }}</span>            
						</a>
					</li>
					@endforeach
						
				</ul>
				<div class="tab-content">
					@foreach (config('app.locales') as $locale)
					
						<div role="tabpanel" class="tab-pane fade @if($locale == app()->getLocale()) active show @endif " id="locale-{{ $locale }}">
							@foreach (settingTransAttrs($setting) as $key => $field)
							
							<div class="form-group">
					
								{{ Form::label(trans('admin.'.$key), null, ['class' => 'control-label']) }}
								
								@if ($field['type'] == 'textarea')
									
										{{ Form::textarea($k.'['.$key.'][value]['.$locale.']',  $field['value'][$locale] ?? null, [
											'class' => 'form-control ckeditor', 
										]) }}

								@elseif($field['type'] == 'text')

									{{ Form::text($k.'['.$key.'][value]['.$locale.']',  $field['value'][$locale] ?? null, array_merge(['class' => 'form-control'])) }}
								
								
								@endif
								
							</div>
							
							@endforeach

						</div>
						
					@endforeach
				</div> 

				<br>
				@foreach (settingNonTransAttrs($setting) as $key => $field)
					<div class="form-group">
							
						{{ Form::label($key, trans('admin.'.$key), null, ['class' => 'control-label']) }}
					
						@if($field['type'] == 'select')
							<select name="{{ $k }}[{{ $key }}][value]" id="" class="form-control">
								@foreach (getSectionsWithTypes($field['options']) as $section)
									<option @if ($field['value'] == $section->id) selected @endif value="{{ $section->id }}">{{ $section->title }}</option>
								@endforeach
							</select>
						@elseif($field['type'] == 'text')

							{{ Form::text($k.'['.$key.'][value]',  $field['value'][$locale] ?? null, array_merge(['class' => 'form-control'])) }}
							
							
						@endif
					</div>
					
										
				@endforeach

				
			
			
		</div>
		@endforeach
	</div>
        

    
@endif
            
                
                

                