    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon/favicon_96x96.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon_32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon_16x16.png') }}">

@extends('layouts.app')
@section('sidebar')
@extends('layouts.side')
@endsection
@section('content')

    <div class="message alert alert-success">{{ $message ?? "" }}</div>
    
<div class="container" style="padding-top: 15px">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-10 col-md-11 col-sm-offset-0 col-md-offset-0">
        	<div class="panel panel-default">
        		<div class="panel-heading">
		    		<h3 class="panel-title">Search Player</h3>
	 			</div>
	 			<div class="panel-body">
    				{!! Form::label('search', 'Search Player: ') !!}
	 				{!! Form::text('search') !!}
    			</div>
	    	</div>
    		</div>
		</div>
	</div>
</div>
	
	<h1>Players Page</h1>
	@foreach($players as $player)


		<a href="/players/{{$player->id}}"><table class="yann_table_maxsize">
			<tr class="yann_table_g">
				<td width="75"><img class="yann_table_img" src="{{ asset('img/players').'/'.$player->pict}}" alt="{{$player->name}}"></td>
				<td colspan="8" align="left">
					<table class="yann_subtable_maxsize">
						<tr class="yann_table_maxsize yann_subtable">
							<th class="yann_table_g">Name :</th>
							<td class="yann_table_g">{{$player->name}}</td>
							<th class="yann_table_g">Team :</th>
							<td class="yann_table_g">{{$player->team}}</td>
							<th class="yann_table_g">Age :</th>
							<td class="yann_table_g">{{$player->age}}</td>
						</tr>
					</table>
					<table class="yann_subtable_maxsize">
						<tr class="yann_table_g yann_table_maxsize yann_subtable">
							<th class="yann_table_g">HP :</th>
							<td class="yann_table_g">{{$player->HP}}</td>
							<th class="yann_table_g">SP :</th>
							<td class="yann_table_g">{{$player->SP}}</td>
							<th class="yann_table_g">EN :</th>
							<td class="yann_table_g">{{$player->EN}}</td>
							<th class="yann_table_g">AT :</th>
							<td class="yann_table_g">{{$player->AT}}</td>
						</tr>
						<tr class="yann_table_g yann_table_maxsize yann_subtable">
							<th class="yann_table_g">PA :</th>
							<td class="yann_table_g">{{$player->PA}}</td>
							<th class="yann_table_g">BL :</th>
							<td class="yann_table_g">{{$player->BL}}</td>
							<th class="yann_table_g">SH :</th>
							<td class="yann_table_g">{{$player->SH}}</td>
							<th class="yann_table_g">CA :</th>
							<td class="yann_table_g">{{$player->CA}}</td>
						</tr>
						<tr class="yann_table_g yann_table_maxsize yann_subtable">
							<th class="yann_table_g">Wins :</th>
							<td class="yann_table_g">{{$player->w}}</td>
							<th class="yann_table_g">Loses :</th>
							<td class="yann_table_g">{{$player->l}}</td>
							<th class="yann_table_g">Goals :</th>
							<td class="yann_table_g">{{$player->goals}}</td>
							<th class="yann_table_g">Faults :</th>
							<td class="yann_table_g">{{$player->faults}}</td>
						</tr>
					</table>
				</td>
			</tr>
		</table></a>

	@endforeach


	<script src="{{ asset('js/search_player.js') }}"></script>
    <script src="{{ asset('js/error_msg.js') }}"></script>
@endsection