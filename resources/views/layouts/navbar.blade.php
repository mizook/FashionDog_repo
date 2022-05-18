<!doctype html>
<html lang="es">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- Sweet Alerts -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}" defer></script>

    <!-- Title -->
    <link rel="icon" type="image/x-icon" href="../assets/FashionDogLogo.ico" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/content.css') }}" rel="stylesheet">

</head>



<!-- NavBar -->
<header>

    <div class="container-fluid topbar">
        <div class="row" style="height: 80px">

            <div class="container navbar-logo">
                <a href="{{ route('client.dashboard') }}">
                    <img class="align-self-center" src="/../assets/img/FashionDogLogo.png" style="width: 80px">
                </a>
            </div>

            <div class="container navbar-message">

                <div class="container d-inline">
                    <i class="fa fa-check-square d-inline" aria-hidden="true"></i>
                </div>

                <div class="container d-inline">
                    @if (auth()->guard('administrator')->user())
                    <h5 class="d-inline">
                        ¡Bienvenido Administrador!
                    </h5>
                    @endif
                    @if (auth()->guard('stylist')->user())
                    <h5 class="d-inline">
                        ¡Bienvenido Estilista!
                    </h5>
                    @endif
                    @if (auth()->guard('client')->user())
                    <h5 class="d-inline">
                        ¡Bienvenido Cliente!
                    </h5>
                    @endif
                </div>

            </div>

            <div class="container navbar-options">

                <form action="{{ route('edit.password') }}" method="GET">
                    @csrf
                    <button class="btn btn-warning navbar-button" type="submit">
                        <i class="fa fa-power-off mr-3" aria-hidden="true"></i>Cambiar contraseña
                    </button>
                </form>

                <form action="{{ route('logout') }}" method="POST" class="pl-2">
                    @csrf
                    <button class="btn btn-danger navbar-button" type="submit">
                        <i class="fa fa-power-off mr-3" aria-hidden="true"></i>Cerrar Sesión
                    </button>
                </form>


            </div>

        </div>
    </div>

</header>

<!-- Admin Sidebar -->
@if (auth()->guard('administrator')->user())
<div class="sidebar" style="width: 12.5%">
    <ul class="list-group list-group-flush" style="width: 100%">
        <a href="{{ route('admin.stylists') }}" class="list-group-item list-group-item-action sidebar-options">
            <i class="fa fa-address-book-o mr-3" aria-hidden="true"></i>Administrar Estilistas
        </a>
        <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action sidebar-options">
            <i class="fa fa-user mr-3" aria-hidden="true"></i>Habilitar Usuarios
        </a>
        <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action sidebar-options">
            <i class="fa fa-window-restore mr-2" aria-hidden="true"></i>Administrar Solicitudes

        </a>
        <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action disabled sidebar-options">
            <i class="fa fa-cog mr-3" aria-hidden="true"></i>Configuracion
        </a>
    </ul>
</div>
@endif

<!-- Stylist Sidebar -->
@if (auth()->guard('stylist')->user())
<div class="sidebar" style="width: 12.5%">
    <ul class="list-group list-group-flush" style="width: 100%">
        <a href="{{ route('stylist.dashboard') }}" class="list-group-item list-group-item-action sidebar-options">
            <i class="fa fa-window-restore mr-2" aria-hidden="true"></i>Administrar Solicitudes

        </a>
        <a href="{{ route('stylist.dashboard') }}" class="list-group-item list-group-item-action disabled sidebar-options">
            <i class="fa fa-cog mr-3" aria-hidden="true"></i>Configuracion
        </a>
    </ul>
</div>
@endif

<!-- Client Sidebar -->
@if (auth()->guard('client')->user())
<div class="sidebar" style="width: 12.5%">
    <ul class="list-group list-group-flush" style="width: 100%">
        <a href="{{ route('client.dashboard') }}" class="list-group-item list-group-item-action sidebar-options">
            <i class="fa fa-calendar mr-3" aria-hidden="true"></i>Solicitar Servicio
        </a>
        <a href="{{ route('client.dashboard') }}" class="list-group-item list-group-item-action sidebar-options">
            <i class="fa fa-window-restore mr-3" aria-hidden="true"></i>Administrar Solicitudes
        </a>
        <a href="{{ route('edit.client') }}" class="list-group-item list-group-item-action sidebar-options">
            <i class="fa fa-address-card mr-3" aria-hidden="true"></i>Editar datos de Cuenta

        </a>
        <a href="#{{ route('client.dashboard') }}" class="list-group-item list-group-item-action disabled sidebar-options">
            <i class="fa fa-cog mr-3" aria-hidden="true"></i>Configuracion
        </a>
    </ul>
</div>
@endif


</html>