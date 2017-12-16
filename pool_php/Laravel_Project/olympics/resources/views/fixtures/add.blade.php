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
            {!! Form::label('date', 'Date') !!}
            {!! Form::date('date', now()) !!}
        </p>

        <p>
            {!! Form::label('scoreboard1', 'Score Board') !!}</br>
            {!! Form::number('scoreboard1',0) !!}-{!! Form::number('scoreboard2',0) !!}
        </p>


        <p>
            {!! Form::label('team1_id', 'team 1') !!}</br>
            {!! Form::select('team1_id', $teams_list, NULL) !!}
        </p>


        <p>
            {!! Form::label('team2_id', 'team 2') !!}</br>
            {!! Form::select('team2_id', $teams_list, NULL) !!}
        </p>


        <p>
            {!! Form::label('winner_id', 'Winner') !!}</br>
            {!! Form::select('winner_id', $teams_list, NULL) !!}
        </p>

        <p>
            {!! Form::label('placement', 'Placement') !!}</br>
            {!! Form::select('placement', $placement_list) !!}
        </p>

        <p>
            {!! Form::label('faults', 'Faults') !!}</br>
            {!! Form::number('faults') !!}
        </p>

        <p>
            {!! Form::label('meteo', 'Meteo') !!}</br>
            {!! Form::select('meteo', $meteo_list, NULL) !!}
        </p>

        <p>
            {!! Form::label('referee_id', 'Referee') !!}</br>
            {!! Form::select('referee_id', $referees_list, NULL) !!}
        </p>

        <p>{!! Form::submit('New Fixture') !!}</p>

        {!! Form::close() !!}

    </div>

    <script src="{{ asset('js/error_msg.js') }}"></script>
@endsection