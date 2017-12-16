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
			    		<h3 class="panel-title">New Player</h3>
			 			</div>
			 			<div class="panel-body">
		    			{!! Form::open(array('role' => 'form')) !!}
			    			<div class="row">
			    				<div class="col-xs-4 col-sm-4 col-md-4">
			    					<div class="form-group">
										{!! Form::text('name', NULL, array('placeholder'=>"Player's Name", 'class' => 'form-control input-sm')) !!}
			    					</div>
			    				</div>
			    				<div class="col-xs-4 col-sm-4 col-md-4">
			    					<div class="form-group">
										{!! Form::select('team_id', $teams_list, NULL, array('class' => 'form-control input-sm')) !!}
			    					</div>
			    				</div>
			    				<div class="col-xs-4 col-sm-4 col-md-4">
			    					<div class="form-group">
										{!! Form::text('birthdate', NULL, array('placeholder' => "Player's Birthdate", 'class' => 'form-control input-sm', 'onfocus' => "(this.type='date')")) !!}
			    					</div>
			    				</div>
			    			</div>

			    			<div class="row">
			    				<div class="col-xs-3 col-sm-3 col-md-3">
			    					<div class="form-group">
			    						{!! Form::number('HP', NULL, array('placeholder'=>"Hit Point", 'class' => 'form-control input-sm')) !!}
			    					</div>
			    				</div>
			    				<div class="col-xs-3 col-sm-3 col-md-3">
			    					<div class="form-group">
			    						{!! Form::number('SP', NULL, array('placeholder'=>"Speed", 'class' => 'form-control input-sm')) !!}
			    					</div>
			    				</div>
			    				<div class="col-xs-3 col-sm-3 col-md-3">
			    					<div class="form-group">
			    						{!! Form::number('EN', NULL, array('placeholder'=>"Endurance", 'class' => 'form-control input-sm')) !!}
			    					</div>
			    				</div>
			    				<div class="col-xs-3 col-sm-3 col-md-3">
			    					<div class="form-group">
			    						{!! Form::number('AT', NULL, array('placeholder'=>"Attack", 'class' => 'form-control input-sm')) !!}
			    					</div>
			    				</div>
			    			</div>

			    			<div class="row">
			    				<div class="col-xs-3 col-sm-3 col-md-3">
			    					<div class="form-group">
			    						{!! Form::number('PA', NULL, array('placeholder'=>"Passing", 'class' => 'form-control input-sm')) !!}
			    					</div>
			    				</div>
			    				<div class="col-xs-3 col-sm-3 col-md-3">
			    					<div class="form-group">
			    						{!! Form::number('BL', NULL, array('placeholder'=>"Blocking", 'class' => 'form-control input-sm')) !!}
			    					</div>
			    				</div>
			    				<div class="col-xs-3 col-sm-3 col-md-3">
			    					<div class="form-group">
			    						{!! Form::number('SH', NULL, array('placeholder'=>"Shooting", 'class' => 'form-control input-sm')) !!}
			    					</div>
			    				</div>
			    				<div class="col-xs-3 col-sm-3 col-md-3">
			    					<div class="form-group">
			    						{!! Form::number('CA', NULL, array('placeholder'=>"Catching", 'class' => 'form-control input-sm')) !!}
			    					</div>
			    				</div>
			    			</div>
		    			{!! Form::submit('New Player', array('class' => 'btn btn-info btn-block')) !!}
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>

    @foreach($errors->all() as $error)
    <div class="alert alert-warning">{{ $error }}</div>
    @endforeach


	<h1>Players Page</h1>
	@foreach($players as $player)

		<table class="yann_table_maxsize">
			<tr class="yann_table_g">
				<td width="75"><img class="yann_table_img" src="{{ asset('img/players').'/'.$player->pict}}" alt="{{$player->name}}"></td>
				<td colspan="8" align="left">
					<table class="yann_subtable_maxsize">
						<tr class="yann_table_maxsize yann_subtable">
							<th class="yann_table_g yann_admin">Name :</th>
							<td class="yann_table_g yann_admin">{{$player->name}}</td>
							<th class="yann_table_g yann_admin">Team :</th>
							<td class="yann_table_g yann_admin">{{$player->team}}</td>
							<th class="yann_table_g yann_admin">Age :</th>
							<td class="yann_table_g yann_admin">{{$player->age}}</td>
							<td class="yann_table_g yann_admin"><a href="/players/edit/{{$player->id}}">Edit</a></td>
							<td class="yann_table_g yann_admin"><a href="/players/destroy/{{$player->id}}">Delete</a></td>
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
		</table>

	@endforeach


    <script src="{{ asset('js/error_msg.js') }}"></script>


@endsection