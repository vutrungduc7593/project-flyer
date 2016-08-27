<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <meta name="csrf-token" content="{{ csrf_token() }}">

	<title>Project Flyer</title>
	<link rel="stylesheet" href="{{ url('/css/app.css') }}">
  <link rel="stylesheet" href="{{ url('/css/libs.css') }}">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">

  <script>
  window.Laravel = <?php echo json_encode([
      'csrfToken' => csrf_token(),
  ]); ?>
  </script>
</head>

<body>

  <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
          <div class="navbar-header">

              <!-- Collapsed Hamburger -->
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                  <span class="sr-only">Toggle Navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>                  
              </button>

              <!-- Branding Image -->
              <a class="navbar-brand" href="{{ url('/') }}">
                  Project Flyers
              </a>           
          </div>

          <div class="collapse navbar-collapse" id="app-navbar-collapse">
              <!-- Left Side Of Navbar -->
              <ul class="nav navbar-nav">
                  <li class="active"><a href="{{ url('/home') }}">Home</a></li>
                  <li><a href="#about">About</a></li>
                  <li><a href="#contact">Contact</a></li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Flyers <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="{{ url('/flyers') }}">List Flyers</a></li>
                      <li><a href="{{ url('/flyers/create') }}">Create Flyer</a></li>                      
                      <li role="separator" class="divider"></li>
                      <li class="dropdown-header">Nav header</li>
                      <li><a href="#">Separated link</a></li>
                      <li><a href="#">One more separated link</a></li>                      
                    </ul>
                  </li>
              </ul>

              <!-- Right Side Of Navbar -->
              <ul class="nav navbar-nav navbar-right">
                  <!-- Authentication Links -->
                  @if (Auth::guest())
                      <li><a href="{{ url('/login') }}">Login</a></li>
                      <li><a href="{{ url('/register') }}">Register</a></li>
                  @else
                      <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                              {{ Auth::user()->name }} <span class="caret"></span>
                          </a>

                          <ul class="dropdown-menu" role="menu">
                              <li>
                                  <a href="{{ url('/logout') }}"
                                      onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                      Logout
                                  </a>

                                  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                      {{ csrf_field() }}
                                  </form>
                              </li>
                          </ul>
                      </li>
                  @endif
              </ul>
          </div>
      </div>
  </nav>

	<div class="container">
		@yield('content')	
	</div>

  <script src="{{ url('/js/app.js') }}"></script>
  <script src="{{ url('/js/libs.js') }}"></script>  

  @yield('scripts.footer')

  @include('flash')

</body>
</html>