    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon/favicon_96x96.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon_32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon_16x16.png') }}">

@extends('layouts.app')
@section('sidebar')
@extends('layouts.side')
@endsection
@section('content')

    <div class="message alert alert-success">{{ $message ?? "" }}</div>

	<h1>Transfert {{ $player->name }}</h1>

	{!! Form::open() !!}

	<p>
		{!! Form::label('team_id', 'team') !!}
		{!! Form::select('team_id', $teams_list) !!}
	</p>

		{!! Form::hidden('player_id', $player->id) !!}

	<p>{!! Form::submit('Transfert Player') !!}</p>

	{!! Form::close() !!}

    <script src="{{ asset('js/error_msg.js') }}"></script>
@endsection