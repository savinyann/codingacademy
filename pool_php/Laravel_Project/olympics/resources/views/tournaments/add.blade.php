@extends('layouts.app')
@section('sidebar')
@extends('layouts.side')
@endsection
@section('content')

    {{ $message ?? "" }}

    <div class="flex-center position-ref v_middle">
        {!! Form::open() !!}

        <p>
            {!! Form::label('name', 'Tournament Name') !!}
            {!! Form::text('name') !!}
        </p>

        <p>
            {!! Form::label('price', 'Price') !!}
            {!! Form::text('price') !!}
        </p>

        <p>Participant teams:</p>



        <p>
            {!! Form::submit('New Tournament') !!}
        </p>

        {!! Form::close() !!}
    </div>

@endsection