<html lang="pt-br">
<head>
    @yield('header')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/favicon.ico">

    <title>Filmeoteca</title>
    <!-- Bootstrap -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Custom icons-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet">

    <body>

<!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ url('/') }}">Filmeoteca</a>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>{{ __('Sair') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item"><br/>
                        <a class="nav-link">
                            {{ Auth::user()->name }}
                        </a><hr/>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('home')}}"><i class="fas fa-home"></i>
                            Home <span class="sr-only">(current)</span>
                        </a>
                    </li>

                    @if(Auth::user()->rule == 'admin')
                        <li class="nav-item">
                            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                                <span>Configurações</span>
                            </h6>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="{{route('dashboard')}}"><i class="fas fa-chart-line"></i>
                                Dashboard <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('movies')}}"><i class="fas fa-film"></i>
                                Filmes
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('users')}}"><i class="fas fa-users"></i>
                                Usuários
                            </a>
                        </li>
                     @else
                        <li class="nav-item">
                            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                                <span>Configurações</span>
                            </h6>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('userEdit')}}"><i class="fas fa-user"></i>
                                Perfil
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>

    <div class="container">
        <div class="card" style="margin-top: 60px;margin-left: 150px">
            <div class="card-body ">
                @yield('content')
            </div>
        </div>
    </div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>



    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/mask/jquery.maskedinput.min.js') }}"></script>


    <!-- Charts-->

<!--    <script src="{{ asset('js/dashboard.js') }}"></script>-->

    @yield('scripts')

    </body>

</html>
