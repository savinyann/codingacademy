<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $animal != null ? $animal->name : "Unknow"}}</title>

        <!-- Fonts -->
        <link rel="icon" href="{{ asset('img/favicon.ico') }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" />

    </head>

    
    <body class="my_body">
        @extends('layouts.app')
        @section('content')

        <div class="flex-center position-ref full-height">

            @if($animal == NULL)

            <div class="alert alert-success"><p class="my_p">No animals has been registered with this id. So, fuck you.</div>

            @else

			<p class="my_p"><span class="name">{{$animal->name}}</span> is a <span class="type">{{$animal->type}}</span> <span class="gender">{{$animal->gender ?? "Male"}}</span> of <span class="age">{{$animal->age}}</span> years. It is <span class="height">{{$animal->height}}</span> m height.</p>

            @endif
        </div>
    </body>
</html>
@endsection