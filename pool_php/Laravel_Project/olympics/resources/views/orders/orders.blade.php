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
    <div class="col-md-12 yann_table_maxsize">
        <h2>Orders Table</h2>
        
        <table>
            <thead>
                <tr>
                    <th class="col-xs-1">#</th>
                    <th class="col-xs-2">email</th>
                    <th class="col-xs-1">Bet ID</th>
                    <th class="col-xs-1">Amount</th>
                    <th class="col-xs-1">Team selected</th>
                    <th class="col-xs-1">Rating</th>
                    <th class="col-xs-2">Date</th>
                    <th class="col-xs-1">Credit user</th>
                    <th class="col-xs-1">Disable</th>
                </tr>
            </thead>
            <tbody class="points_table_scrollbar">
    
@foreach ($orders as $order)
                <tr class="odd">
                    <td class="col-xs-1">{{$order->id }}</td>
                    <td class="col-xs-2">{{ $order->email }}</td>
                    <td class="col-xs-1">{{$order->bet_id }}</td>
                    <td class="col-xs-1">{{ $order->price }}</td>
                    <td class="col-xs-1">{{ $order->team_selected }}</td>
                    <td class="col-xs-1">{{ $order->team_selected_rating }}</td>
                    <td class="col-xs-2">{{ $order->created_at }}</td>
                    <td class="col-xs-1"><a class="btn btn-group btn-success" href="/orders/credit/{{ $order->id }}/{{ $order->user_id }}/{{ $order->price }}/{{ $order->team_selected_rating }}">Gain</a><td>
                    <td class="col-xs-1"><a class="btn btn-primary" href="/orders/destroy/{{ $order->id }}">Disable</a></td>
                </tr>
@endforeach
               
            </tbody>
        </table>
    </div>
</div>

    <script src="{{ asset('js/error_msg.js') }}"></script>
@endsection