<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
	    <meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">

    	<title>I <3 Geckos !</title>

        <!-- Fonts -->
        <link rel="icon" href="{{ asset('img/favicon.ico') }}">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
</head>


<div class="alert alert-success">
	I love <strong>Geckos</strong>.
</div>


<div class="alert alert-success">
	I love <strong>Geckos</strong>, especially the ones of {{$day ?? "Monday evening ".$heart}}.
</div>


<div class="alert alert-success">
	I love <strong>Geckos</strong>, especially the ones of {{$_GET["day"] ?? "Monday evening ".$heart}} with GET.
</div>