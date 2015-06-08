{!! Form::open(['route' => $route, 'method' => $method]) !!}
    @include('forms::partials.errors')

    @foreach ($fields as $fieldName => $options)
        <div class="form-group{!! $errors->has($fieldName) ? ' has-error' : '' !!}">
            {!! Form::label($fieldName, $options['label'], [
                'class' => 'control-label'
            ]) !!}

            @if ($options['type'] == 'textarea')
                {!! Form::textarea($fieldName, old($fieldName), [
                    'class'       => 'form-control',
                    'placeholder' => $options['placeholder']
                ]) !!}
            @elseif ($options['type'] == 'select')
                {!! Form::select($fieldName, $options['choices'], old($fieldName), [
                    'class'       => 'form-control',
                    'placeholder' => $options['placeholder']
                ]) !!}
            @else
                {!! Form::text($fieldName, old($fieldName), [
                    'class'       => 'form-control',
                    'placeholder' => $options['placeholder']
                ]) !!}
            @endif

            @include('forms::partials.help')
        </div>
    @endforeach

    <div class="form-group">
        {!! Form::submit($submit, [
            'class' => 'btn btn-primary pull-right'
        ]) !!}
    </div>
{!! Form::close() !!}
