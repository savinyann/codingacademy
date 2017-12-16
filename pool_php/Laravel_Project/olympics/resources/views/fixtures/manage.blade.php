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
                        <h3 class="panel-title">New Match</h3>
                        </div>
                        <div class="panel-body">
                        {!! Form::open(array('role' => 'form')) !!}
                            <div class="row">
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        {!! Form::date('date', now(), array('class' => 'form-control input-sm')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        {!! Form::select('placement', $placement_list, NULL, array('class' => 'form-control input-sm')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        {!! Form::select('meteo', $meteo_list, NULL, array('class' => 'form-control input-sm')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        {!! Form::select('referee_id', $referees_list, NULL, array('class' => 'form-control input-sm')) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                    {!! Form::select('team1_id', $teams_list, NULL, array('placeholder' => 'Team 1', 'class' => 'form-control input-sm', 'id' => 'team1')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        {!! Form::number('scoreboard1', NULL, array('placeholder' => 'Team 1 Score','class' => 'form-control input-sm')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        {!! Form::number('scoreboard2', NULL, array('style'=>'text-align:right','placeholder' => 'Team 2 Score','class' => 'form-control input-sm')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        {!! Form::select('team2_id', $teams_list, NULL, array('placeholder' => 'Team 2','class' => 'form-control input-sm', 'id' => 'team2')) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        {!! Form::number('faults1', NULL, array('placeholder' => 'team 1 faults', 'class' => 'form-control input-sm')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        {!! Form::select('winner_id', $teams_list, NULL, array('placeholder' => 'Team','class' => 'form-control input-sm', 'id' => 'winner')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        {!! Form::number('faults2', NULL, array('placeholder' => 'team 2 faults', 'class' => 'form-control input-sm')) !!}
                                    </div>
                                </div>
                            </div>
                        {!! Form::submit('New Match', array('class' => 'btn btn-info btn-block')) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach($errors->all() as $error)
    <div class="alert alert-warning">{{ $error }}</div>
    @endforeach

    <h1>Matches Page</h1>

    @foreach($fixtures as $fixture)

        <table class="yann_fixture_table_maxsize">
            <tr class="yann_fixture_table_g">
                <table class=yann_fixture_subtable_maxsize>
                    <tr class="yann_fixture_table_g">
                        <th class="yann_fixture_table_g yann_admin_fixtures">Date</th>
                        <td class="yann_fixture_table_g yann_admin_fixtures">{{ $fixture->date }}</td>
                        <th class="yann_fixture_table_g yann_admin_fixtures">Placement</th>
                        <td class="yann_fixture_table_g yann_admin_fixtures">{{ $fixture->placement }}</td>
                        <th class="yann_fixture_table_g yann_admin_fixtures">Meteo</th>
                        <td class="yann_fixture_table_g yann_admin_fixtures">{{ $fixture->meteo }}</td>
                        <th class="yann_fixture_table_g yann_admin_fixtures">Refereed by</th>
                        <td class="yann_fixture_table_g yann_admin_fixtures">{{ $fixture->referee }}</td>
                        <td class="yann_fixture_table_g yann_admin_fixtures"><a href="/fixtures/edit/{{$fixture->id}}">Edit</a></td>
                    </tr>
                </table>
            </tr>
            <tr class="yann_fixture_table_g">
                <table class="yann_fixture_subtable_maxsize">
                    <tr class="yann_fixture_table_g">
                        <th class="yann_fixture_table_g yann_team_left">{{$fixture->team1 }}</th>
                        <th class="yann_fixture_table_g yann_score">{{ $fixture->scoreboard }}</th>
                        <th class="yann_fixture_table_g yann_team_right">{{ $fixture->team2 }}</th>
                    </tr>
                </table>
            </tr>
        </table><br>
    
    @endforeach

    <script src="{{ asset('js/new_fixture.js') }}"></script>
    <script src="{{ asset('js/error_msg.js') }}"></script>

@endsection