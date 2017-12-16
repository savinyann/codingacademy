    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon/favicon_96x96.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon_32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon_16x16.png') }}">

@extends('layouts.app')
@section('sidebar')
@extends('layouts.side')
@endsection
@section('content')

    <div class="message alert alert-success">{{ $message ?? "" }}</div>

<a class="btn btn-warning" href="/bets/add">Add new Bets</a>

<table class="yann_table_maxsize">
	<thead>
		<tr>
			<th>#</th>
			<th>Team 1</th>
			<th>Team 1 rating</th>
			<th>Team 2</th>
			<th>Team 2 rating</th>
			<th></th>
		</tr>
	</thead>
	<tbody>

@foreach ($bets as $bet)
<tr>
<td>{{ $bet->id }}</td>
<td>{{ $bet->team_1 }}</td>
<td>{{ $bet->team_1_rating }}</td>
<td>{{ $bet->team_2 }}</td>
<td>{{ $bet->team_2_rating }}</td>
<td><a href="/bets/destroy/{{ $bet->id }}">delete</a></td>
</tr>

@endforeach
</tbody>
</table>

    <script src="{{ asset('js/error_msg.js') }}"></script>
@endsection