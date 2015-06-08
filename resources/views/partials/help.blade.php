@if ($errors->has($fieldName))
    <span class="help-block {{{ $helpOffsets }}}">{!! $errors->first($fieldName) !!}</span>
@endif
