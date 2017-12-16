    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon/favicon_96x96.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon_32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon_16x16.png') }}">

@extends('layouts.app')
@section('sidebar')
@extends('layouts.side')
@endsection

@section('content')
    <div class="message alert alert-success">{{ $message ?? "" }}</div>
    
<div class="container">
        <div class="col-md-10 yann_table_maxsize">


        {!! Form::open() !!}

        <p>
            {!! Form::label('teams_1', 'team_1') !!}</br>
            {!! Form::select('team_1', $teams_list) !!}
        </p>

         <p>
            {!! Form::label('teams_1_rating', 'team_1_rating') !!}</br>
            {!! Form::number('team_1_rating', '', ['step' => 'any']) !!}
        </p>

        <p>
            {!! Form::label('teams_2', 'team_2') !!}</br>
            {!! Form::select('team_2', $teams_list) !!}
        </p>
        <p>
            {!! Form::label('teams_2_rating', 'team_2_rating') !!}</br>
            {!! Form::number('team_2_rating', '', ['step' => '0.01', 'min_value' => '1']) !!}
        </p>
        

        <p>
            {!! Form::submit('New Bet') !!}
        </p>

        {!! Form::close() !!}
    </div>
</div>


    <script src="{{ asset('js/error_msg.js') }}"></script>
@endsection