    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon/favicon_96x96.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon_32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon_16x16.png') }}">

@extends('layouts.app')
@section('sidebar')
@extends('layouts.side')
@endsection
@section('content')

    <div class="message alert alert-success">{{ $message ?? "" }}</div>

	<h1>Player Page</h1>

		<table class="yann_table_maxsize">
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
		</table>

<div class="container">
	<div class="row">
        <div class="col-md-12">
            <div class="text-center text-uppercase">
                <h2>Statistics</h2>
            </div>
            
            <div class="column-chart">
                <div class="legend legend-left hidden-xs">
                </div>
            
            
                <div class="chart clearfix">
                    <div class="item">
                        <div class="bar">
                            <span class="percent">HP</span>
            
                            <div class="item-progress" data-percent={{$player->HP*100/9999}}>
                                <span class="title">{{$player->HP}}</span>
                            </div>
                        </div>
                    </div>
            
                    <div class="item">
                        <div class="bar">
                            <span class="percent">SP</span>
            
                            <div class="item-progress" data-percent="{{$player->SP}}">
                                <span class="title">{{$player->SP}}</span>
                            </div>
                        </div>
                    </div>
            
                    <div class="item">
                        <div class="bar">
                            <span class="percent">EN</span>
            
                            <div class="item-progress" data-percent="{{$player->EN}}">
                                <span class="title">{{$player->EN}}</span>
                            </div>
                        </div>
                    </div>
            
                    <div class="item">
                        <div class="bar">
                            <span class="percent">AT</span>
            
                            <div class="item-progress" data-percent="{{$player->AT}}">
                                <span class="title">{{$player->AT}}</span>
                            </div>
                        </div>
                    </div>
            
                    <div class="item">
                        <div class="bar">
                            <span class="percent">PA</span>
            
                            <div class="item-progress" data-percent="{{$player->PA}}">
                                <span class="title">{{$player->PA}}</span>
                            </div>
                        </div>
                    </div>
            
                    <div class="item">
                        <div class="bar">
                            <span class="percent">BL</span>
            
                            <div class="item-progress" data-percent="{{$player->BL}}">
                                <span class="title">{{$player->BL}}</span>
                            </div>
                        </div>
                    </div>
            
                    <div class="item">
                        <div class="bar">
                            <span class="percent">SH</span>
            
                            <div class="item-progress" data-percent="{{$player->SH}}">
                                <span class="title">{{$player->SH}}</span>
                            </div>
                        </div>
                    </div>
            
                    <div class="item">
                        <div class="bar">
                            <span class="percent">CA</span>
            
                            <div class="item-progress" data-percent="{{$player->CA}}">
                                <span class="title">{{$player->CA}}</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/player_graph.js') }}"></script>
    <script src="{{ asset('js/error_msg.js') }}"></script>

@endsection