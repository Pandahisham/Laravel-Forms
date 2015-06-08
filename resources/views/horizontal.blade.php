{!! Form::open(['route' => $route, 'method' => $method, 'class' => 'form-horizontal']) !!}
    @include('forms::partials.errors')

    @foreach ($fields as $fieldName => $options)
        <div class="form-group{!! $errors->has($fieldName) ? ' has-error' : '' !!}">
            {!! Form::label($fieldName, $options['label'], [
                'class' => 'control-label '.$labelWidths
            ]) !!}

            @if ($options['type'] == 'textarea')
                <div class="{{{ $fieldWidths }}}">
                    {!! Form::textarea($fieldName, old($fieldName), [
                        'class'       => 'form-control',
                        'placeholder' => $options['placeholder']
                    ]) !!}
                </div>
            @elseif ($options['type'] == 'select')
                <div class="{{{ $fieldWidths }}}">
                    {!! Form::select($fieldName, $options['choices'], old($fieldName), [
                        'class'       => 'form-control',
                        'placeholder' => $options['placeholder']
                    ]) !!}
                </div>
            @else
                <div class="{{{ $fieldWidths }}}">
                    {!! Form::text($fieldName, old($fieldName), [
                        'class'       => 'form-control',
                        'placeholder' => $options['placeholder']
                    ]) !!}
                </div>
            @endif

            @include('forms::partials.help')
        </div>
    @endforeach

    <div class="form-group">
        <div class="{{{ $buttonWidths }}}">
            {!! Form::submit($submit, [
                'class' => 'btn btn-primary pull-right'
            ]) !!}
        </div>
    </div>
{!! Form::close() !!}
