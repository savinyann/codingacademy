    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon/favicon_96x96.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon_32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon_16x16.png') }}">

@extends('layouts.app')
@section('sidebar')
@extends('layouts.side')
@endsection
@section('content')

    <div class="message alert alert-success">{{ $message ?? "" }}</div>

        <table class="yann_fixture_table_maxsize">
            <tr class="yann_fixture_table_g">
                <table class=yann_fixture_subtable_maxsize>
                    <tr class="yann_fixture_table_g">
                        <th class="yann_fixture_table_g">Date</th>
                        <td class="yann_fixture_table_g">{{ $fixture->date }}</td>
                        <th class="yann_fixture_table_g">Placement</th>
                        <td class="yann_fixture_table_g">{{ $fixture->placement }}</td>
                        <th class="yann_fixture_table_g">Meteo</th>
                        <td class="yann_fixture_table_g">{{ $fixture->meteo->meteo }}</td>
                        <th class="yann_fixture_table_g">Refereed by</th>
                        <td class="yann_fixture_table_g">{{ $fixture->referee->name }}</td>
                    </tr>
                </table>
            </tr>
            <tr class="yann_fixture_table_g">
                <table class="yann_fixture_subtable_maxsize">
                    <tr class="yann_fixture_table_g">
                        <th class="yann_fixture_table_g yann_team_left">{{$fixture->team1->name }}</th>
                        <th class="yann_fixture_table_g yann_score">{{ $fixture->scoreboard }}</th>
                        <th class="yann_fixture_table_g yann_team_right">{{ $fixture->team2->name }}</th>
                    </tr>
                </table>
            </tr>
        </table>
        
    <script src="{{ asset('js/error_msg.js') }}"></script>
@endsection