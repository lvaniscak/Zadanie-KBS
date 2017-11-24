<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>@yield('title')</title>


  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
  <link href="/css/app.css" rel="stylesheet" type="text/css"
</head>
<body>


  @php(Menu::make('MyNavBar', function($menu){

    $menu->add('Úvod');
    $menu->add('Registrácia', 'user/create');
    $menu->add('Porovnanie', 'hobbies/compare');
    $menu->add('Zoznam', 'user/list');

  }))


  {!! Menu::get('MyNavBar')->asUl() !!}
  
  <div class="content">

    @yield('content')

  </div>
</body>
</html>
