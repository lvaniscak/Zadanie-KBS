<!doctype html>
<html class="page-color" lang="{{ app()->getLocale() }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="/js/ajaxscripts.js" type="text/javascript"></script>
    <script src="/js/app.js" type="text/javascript"></script>
    <link href="/css/app.css" rel="stylesheet" type="text/css">
</head>
<body class="body-color">


<nav class="navbar navbar-inverse">
    <div class="container-fluid">

        {!! Menu::get('Menu')->asUl(['class' => 'nav navbar-nav']) !!}

    </div>

</nav>


<div class="container">
    <div class="content">

        @yield('content')
    </div>

</div>
</body>
</html>
