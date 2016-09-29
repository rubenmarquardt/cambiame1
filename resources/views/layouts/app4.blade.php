<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Cambiame</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
  <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
  <script src="https://www.atlasestateagents.co.uk/javascript/tether.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Animate CSS framework-->
  <link rel="stylesheet" href="{{ url('css')}}/animate.css" >
  <!-- rating bootsrap componente -->
  <link rel="stylesheet" href="{{ url('css')}}/star-rating.min.css" >
  <link rel="stylesheet" href="{{ url('css')}}/theme.css" >
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->

  <meta name="_token" content="{!! csrf_token() !!}"/>

  <!-- Styles -->
  <link href="{{ url('css/app2.css') }}" rel="stylesheet">

  <!-- Styles rating -->
  
<link href='https://fonts.googleapis.com/css?family=Roboto:400,500,400italic,300,300italic' rel='stylesheet' type='text/css'>


</head>

  <nav class="navbar navbar-default navbar-static-top" style="background:#494d49;color:white;">
    <div class="container">
      <div class="navbar-header" style="height:75px">
        <div class="col-sm-2 col-xs-2 col-lg-2 col-md-2 text-center">
          <!-- Branding Image -->
          <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ url('/images/loguito.png')}}" />
          </a>
        </div>

        <div class="col-sm-8 col-xs-8 col-lg-8 col-md-8 text-center" style="margin-top: 21px;">
          <a href="{{ url('/') }}" >
            <img src="{{ url('/images/logoletras.png')}}" />
          </a>
        </div>
        <div class="col-sm-2 col-xs-2 col-lg-2 col-md-2 text-center">

          <!-- Collapsed Hamburger -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" style="margin-top: 20px;">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
      </div>
      <div class="collapse navbar-collapse" id="app-navbar-collapse">
        <!-- Left Side Of Navbar -->
        <ul class="nav navbar-nav">
          <li><a href="{{ url('/home') }}">Home</a></li>
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right">
          <!-- Authentication Links -->
          @if (Auth::guest())
          <li><a href="{{ url('/social/linkedin') }}">Login</a></li>
          <li><a href="{{ url('/social/linkedin') }}">Register</a></li>
          @else
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
            <li><a href=" {{ url('usuario/ofertas') }}/{{ Auth::user()->id }}"><i class="fa fa-btn glyphicon glyphicon-star"></i>mis ofertas</a></li>
            <li><a href=" {{ url('usuario/negociaciones') }}/{{ Auth::user()->id }}"><i class="fa fa-btn glyphicon glyphicon-star"></i>mis negociaciones</a></li>
              <li><a href=" {{ action ('SocialController@logoutActivo') }}/{{Auth::user()->id}}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
            </ul>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>

<body style="background:#ffffff;" id="app-layout">

  <div class="container-fluid" id="elmaster">
    <div class="content" style="background: white;">

      @yield('cotenido de logueo')
      @yield('contenido del muro')  
      @yield('content')  
      @yield('calificar oferta')          

    </div>
  </div>
  @include('muro.footer')


