    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon/favicon_96x96.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon_32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon_16x16.png') }}">

@extends('layouts.app')
@section('sidebar')
@extends('layouts.side')
@endsection

@section('content')
    <div class="message alert alert-success">{{ $message ?? "" }}</div>

<div class="row">
	<div class="col-md-2 yann_table_maxsize">
		<div id="charge-error" class="alert alert-danger {{ Session::has('error') ? 'hidden' : '' }}">
			{{ Session::get('error') }}
		</div>
		<form action="{{ route('addCard') }}" method="post" class="checkout-form">
			<div class="row">
				<div class="col-xs-12">
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" id="name" class="form-control" required>
					</div>
				</div>
				<div class="col-xs-12">
					<div class="form-group">
						<label for="card-number">Credit Card Number</label>
						<input type="text" id="card-number" class="form-control" minlength="12" maxlength="12" required>
					</div>
				</div>
				<div class="col-xs-12">
					<div class="form-group">
						<label for="card-expiry-month">Expiry Month</label>
						<input type="text" id="card-expiry-month" class="form-control" minlength="2" maxlength="2" required>
					</div>
				</div>
				<div class="col-xs-12">
					<div class="form-group">
						<label for="card-expiry-year">Expiry Year</label>
						<input type="text" id="card-expiry-year" class="form-control" minlength="2" maxlength="2" required>
					</div>
				</div>
				<div class="col-xs-12">
					<div class="form-group">
						<label for="card-cvc">CVC</label>
						<input type="text" id="card-cvc" class="form-control" minlength="4" maxlength="4" required>
					</div>
				</div>
			</div>
			{{ csrf_field() }}	
			<button type="submit" class="btn btn-success">Add</button>
		</form>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript" src="{{ URL::to('js/checkout.js') }}"></script>
    <script src="{{ asset('js/error_msg.js') }}"></script>

@endsection