<!doctype html>
<html lang="es">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS/JS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>

    <!-- Sweet Alerts -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}" defer></script>
    <script src="js/scripts.js"></script>

    <!-- flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


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
                    <button class="btn btn-warning navbar-button" style="background-color: #FFD872" type="submit">
                        <i class="fa fa-cog mr-3" aria-hidden="true"></i>Cambiar contraseña
                    </button>
                </form>

                <form action="{{ route('logout') }}" method="POST" class="pl-2">
                    @csrf
                    <button class="btn btn-danger navbar-button" style="background-color: #FC6238" type="submit">
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
        <button type="button" class="list-group-item list-group-item-action sidebar-options" style="padding-top: 5%" data-bs-toggle="modal" data-bs-target="#disableUserForm">
            <i class="fa fa-user mr-3" aria-hidden="true"></i>Habilitar Usuarios
        </button>
        <a href="{{ route('admin.manage_requests') }}" class="list-group-item list-group-item-action sidebar-options">
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
        <button type="button" class="list-group-item list-group-item-action sidebar-options" style="padding-top: 5%" data-bs-toggle="modal" data-bs-target="#selectRequestsDateForm">
            <i class="fa fa-plus-square mr-2" aria-hidden="true"></i> Realizar servicio
        </button>
        <a href="{{ route('list.services') }}" class="list-group-item list-group-item-action sidebar-options">
            <i class="fa fa-window-restore mr-3" aria-hidden="true"></i>Administrar solicitudes
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
        <a href="{{ route('add.request') }}" class="list-group-item list-group-item-action sidebar-options">
            <i class="fa fa-calendar mr-3" aria-hidden="true"></i>Solicitar Servicio
        </a>
        <a href="{{ route('manage.requests') }}" class="list-group-item list-group-item-action sidebar-options">
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





<!-- ADMIN DisableUserForm (Modal para buscar usuario habilitar-deshabilitar) -->
<div class="modal fade" id="disableUserForm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="disableUserFormLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header pt-2 pb-2" style="background-color: #ff828b">
                <h5 class="modal-title font-weight-bold" id="disableUserFormLabel">Habilitar/Deshabilitar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <div class="container d-flex justify-content-center" style="margin-top: 5%">
                    <img class="align-self-center mr-3 mb-4" src="/../assets/img/FashionDogLogo.png" style="width: 50px">
                    <h3 class="font-weight-bold mt-2" style="text-align: center">Buscar usuario</h3>
                </div>

                <form action="{{ route('find.user') }}" method="POST">
                    @csrf

                    <div class="container d-flex" style="margin-top: 5%">
                        <label for="userRut" class="col-md-4 col-form-label text-md-end font-weight-bold">{{ __('Ingrese RUT') }}</label>
                        <div class="col-md-6">
                            <input id="userRut" type="text" placeholder="EJ: 12345678K"
                                class="form-control rounded @error('userRut') is-invalid @enderror" name="userRut"
                                value="{{ old('userRut') }}" autofocus>

                            @error('userRut')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="container-fluid justify-content-center mt-5" style="text-align: right">
                        <button type="submit" style="background-color: #ff828b" class="btn btn-dark mr-5">
                            {{ __('Buscar RUT') }}
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

<!-- Stylist filtrar solicitudes por fecha -->
<div class="modal fade" id="selectRequestsDateForm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="selectRequestsDateFormLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header pt-2 pb-2" style="background-color: #ff828b">
                <h5 class="modal-title font-weight-bold" id="selectRequestsDateFormLabel">Escoge la fecha para filtrar la búsqueda de solicitudes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <div class="container d-flex justify-content-center" style="margin-top: 5%">
                    <img class="align-self-center mr-3 mb-4" src="/../assets/img/FashionDogLogo.png" style="width: 50px">
                    <h3 class="font-weight-bold mt-2" style="text-align: center">Seleccione Fecha</h3>
                </div>

                <div class="card-body">
                    <form id="selectRequestsDateForm" method="GET"
                        action="{{ route('stylist.take_request_page') }}">
                        @csrf

                        <div class="row form-group">
                            <label for="input_date"
                                class="col-md-4 col-form-label text-md-end">{{ __('Fecha') }}
                            </label>
                            <div class="col-sm-6">
                                <input id="input_date" type="datetime-local"
                                    class="form-control @error('input_date') is-invalid @enderror"
                                    name="input_date" required
                                    placeholder="Hoy...">

                                @error('input_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark"
                                    style="background-color: #ff828b">{{ __('Buscar') }}
                                </button>
                            </div>
                        </div>
                        <div>
                            <h1></h1>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>



<!-- Abrir Modal de Buscar Usuario para deshabilitar/habilitar si hay algún error -->
@if($errors->get('userRut'))
<script>
    var myModal = new bootstrap.Modal(document.getElementById('disableUserForm'), {})
    myModal.toggle()
</script>
@endif



<!-- flatpickr -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    config = {
        mode: "single",
        dateFormat: "Y-m-d",
        altInput: true,
        altFormat: "d/m/Y",
        locale: {
            firstDayOfWeek: 1,
            weekdays: {
                shorthand: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                longhand: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            },
            months: {
                shorthand: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Оct', 'Nov', 'Dic'],
                longhand: ['Enero', 'Febreo', 'Мarzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre',
                    'Octubre', 'Noviembre', 'Diciembre'
                ],
            },
        },
    }


    flatpickr("input[id=input_date]", config);
</script>
<script>
    config = {
        noCalendar: true,
        enableTime: true,
        dateFormat: "H:i",
        time_24hr: true
    }

    flatpickr("input[id=input_time]", config);
</script>

</html>
