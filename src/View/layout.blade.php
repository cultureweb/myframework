<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'home')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/header.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/font.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/footerdesign.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/cherii.css')}}"/>
    <link rel="icon" type="image/png" href="{{asset('images/favicon.png')}}"/>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
{{--<link rel="stylesheet" href="{{asset('fonts/font.css')}}"/>--}}
    @stack('style')
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    {{--<link rel="stylesheet" id="font-stroke-css" href="{{ asset('css/font-stroke.css')}}" >--}}

</head>
<body class="bg-cherii">
@include('header')

<main class="container">

@yield('content')
</main>
@include('footer')
</body>
</html>







