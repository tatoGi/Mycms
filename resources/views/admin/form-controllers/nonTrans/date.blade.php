
<div class="form-group col-lg-6 ">
    
    <div class="row">
        {{ Form::label(trans('admin.'.$key), null, ['class' => 'control-label']) }}
        {{ Form::text($key, null, array_merge(['class' => 'form-control', 'placeholder' => "dd/mm/yyyy", 'autocomplete'=>"off" , 'id' => "datepicker-autoclose"])) }}
        {{-- {{ Form::text($key, null, array_merge(['class' => 'form-control', 'placeholder' => "dd/mm/yyyy", 'id' => "timepicker3"])) }} --}}

    </div>

</div>