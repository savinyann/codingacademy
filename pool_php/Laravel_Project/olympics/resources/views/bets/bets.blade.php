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
 @foreach ($bets as $bet)
 
 	
 <form action="{{ route('pay', $bet->id) }}" method="POST">

 	<h1><strong>{{ $bet->team_1 }}</strong> {{ $bet->team_1_rating }}   vs   <strong>{{ $bet->team_2 }}</strong> {{ $bet->team_2_rating }}</h1>
 	
 	{{ csrf_field() }}	    	
 	<h2>{!! Form::select('team_selected', 
 	['1' => $bet->team_1,'2' => $bet->team_2], 'team_selected',['placeholder' => 'Pick a team']) !!}</h2>
 	<h2>
 	{!! Form::number('price', '', ['step' => 'any', 'min' => 1]) !!}	
 	{!! Form::label('price', '€') !!}</h2>	
 	
 	<p>	
 			<script
 			src="https://checkout.stripe.com/checkout.js" class="stripe-button"
 			data-key="{{ env('STRIPE_KEY') }}"
 			data-name="My Store"
 			data-locale="auto"
 			data-currency="eur">
 		</script>
 	</p>				    	
	</form>

@endforeach
	
	</div>
</div>


    <script src="{{ asset('js/error_msg.js') }}"></script>
@endsection