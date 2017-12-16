<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>New Animal</title>
        <link rel="icon" href="{{ asset('img/favicon.ico') }}">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    </head>
@extends('layouts.app')

@section('content')
    <body class="my_body">
        
        <div class="flex-center position-ref full-height">

		    <form method="POST">
        		<input type="text" name="type" placeholder="Type">
        		<input type="text" name="name" placeholder="Name">
        		<input type="text" name="age" placeholder="Age">
        		<select name="gender_id">
        			<option value="1">Male</option>
                    <option value="2">Female</option>
                    <option value="NULL">Neutral</option>
        		</select>
        		<input type="text" name="height" placeholder="Height">
        		<input type="submit" value="New Animal">
        		{{ csrf_field() }}
        	</form>

            @if($echo != "")
            <div class="alert alert-success underform">{{ $echo }}</div>
            @endif

        </div>

    </body>
</html>
@endsection