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
                    <h3 class="panel-title">New Team</h3>
                </div>
                <div class="panel-body">
                {!! Form::open(array('role' => 'form')) !!}
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                                {!! Form::text('name', NULL, array('placeholder' => "Team's Name", 'class' => 'form-control input-sm')) !!}
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                                {!! Form::text('country', NULL, array('placeholder' => "Team's Country", 'class' => 'form-control input-sm')) !!}
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                                {!! Form::text('flag', NULL, array('placeholder' => "Team's Flag", 'class' => 'form-control input-sm')) !!}
                            </div>
                        </div>
                    </div>
                {!! Form::submit('New Team', array('class' => 'btn btn-info btn-block')) !!}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" style="padding-top: 15px">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-10 col-md-11 col-sm-offset-0 col-md-offset-0">
        	<div class="panel panel-default">
        		<div class="panel-heading">
		    		<h3 class="panel-title">Search Team</h3>
	 			</div>
	 			<div class="panel-body">
    				{!! Form::label('search', 'Search Team: ') !!}
	 				{!! Form::text('search') !!}
    			</div>
	    	</div>
    		</div>
		</div>
	</div>
</div>

	<div id="accordion">
		@foreach($teams as $team)

			<a href="/teams/{{$team->id}}"><article>
				<h2>{{$team->name}}</h2>

				<img src="{{ asset('img/teams').'/'.$team->flag}}" alt="no logo" width="100%"></a>
                <p>
                    <a href="/teams/edit/{{ $team->id }}">Edit Team</a>
                </p>
                <p>
                    <a href="/teams/destroy/{{ $team->id }}">Delete Team</a>
                </p>
			</article></a>

    	@endforeach

	</div>
    <div style="clear:both;"></div>

	<script src="{{ asset('js/search_team.js') }}"></script>
    <script src="{{ asset('js/error_msg.js') }}"></script>
@endsection