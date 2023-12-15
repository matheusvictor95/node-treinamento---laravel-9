<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

     <!-- Custom CSS-->
     <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body >
   
     <!-- Dropdown2 Structure -->
     <ul id='dropdown2' class='dropdown-content'>
          <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
          <li><a href="{{route('login.logout')}}">Logout</a></li>
      </ul>

    <nav class="red">
        <div class="nav-wrapper container">
            <a href="{{route('site.index')}}" class="center brand-logo " href="index.html"><img src="{{asset('img/logo.png')}}"></a>
            <ul id="nav-mobile" class="left">
                <li><a href="{{route('site.index')}}">Home</a></li>
            </ul>
            @auth
            <ul id="nav-mobile" class="right">
                <li><a href="" class="dropdown-trigger" data-target='dropdown2'>Olá {{auth()->user()->firstname}}<i class="material-icons right">lock</i></a></li>
            </ul>
                @else
                <ul id="nav-mobile" class="right">
                    <li><a href="{{route('login.form')}}" >Login</a></li>
                    <li><a href="{{route('login.create')}}">Cadastrar <i class="material-icons right">person_add</i></a></li>
                </ul>
            @endauth
        </div>
    </nav>
    <br>
    <section class="row container login">
        @yield('conteudo')
        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script>
          /*Dropdown*/
            var elemDrop = document.querySelectorAll('.dropdown-trigger');
            var instanceDrop = M.Dropdown.init(elemDrop, {
                coverTrigger: false,
                constrainWidth: false
            });
        </script> 
    </section>  
</body>
</html>