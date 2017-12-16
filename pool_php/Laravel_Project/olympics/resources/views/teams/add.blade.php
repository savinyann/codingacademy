    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon/favicon_96x96.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon_32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon_16x16.png') }}">

@extends('layouts.app')
@section('sidebar')
@extends('layouts.side')
@endsection
@section('content')

    <div class="message alert alert-success">{{ $message ?? "" }}</div>

    <div class="flex-center position-ref v_middle">
        {!! Form::open() !!}

        <p>
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name') !!}
        </p>

        <p>
            {!! Form::label('country', 'Country') !!}
            {!! Form::text('country') !!}
        </p>

        <p>
            {!! Form::label('flag', 'Flag') !!}
            {!! Form::text('flag') !!}
        </p>


        <p>
            {!! Form::submit('New Team') !!}
        </p>

        {!! Form::close() !!}
    </div>

    <script src="{{ asset('js/error_msg.js') }}"></script>
@endsection