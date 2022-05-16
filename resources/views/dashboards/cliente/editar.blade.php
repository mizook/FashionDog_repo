<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- Sweet Alerts -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../../../js/scripts.js"></script>


  <title>Editar datos de cliente</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="styles.css">
  <style>
    #sidebar {
      width: 20%;
      height: 100vh;
      background: #343a40;
    }
  </style>
  <link rel="icon" type="image/x-icon" href="assets/FashionDogLogo.ico" />
</head>

<body>
    <div class="d-flex" >
        <div id="sidebar" style="background-color: white">
            <div id="topSideBar" class="p-2">
                <div class="d-inline-block">
                    <img class="pb-5" src="../assets/img/FashionDogLogo.png" alt="" style="width: 100px">
                </div>
                <div class="d-inline-block pt-5">
                    <a href="{{ route('client.dashboard') }}" class="navbar-brand text-center text-dark w-100 p-4">
                        Bienvenido <br> {{ Auth::user()->name }}
                    </a>
                </div>
            </div>
            <div id="sidebar-accordion" class="accordion" style="background-color: white" >
                <div class="list-group" >

                    <a href="{{ route('client.dashboard') }}"
                        class="list-group-item list-group-item-action  text-dark" style="background-color: white">
                        <i class="fa fa-tachometer mr-3" aria-hidden="true"></i>Solicitar servicio
                    </a>

                    <a href="{{ route('client.dashboard') }}"
                        class="list-group-item list-group-item-action text-dark"  style="background-color: white">
                        <i class="fa fa-user mr-3" aria-hidden="true"></i>Administrar Solicitudes
                    </a>

                    <a href="{{ route('edit.client') }}"
                        class="list-group-item list-group-item-action  text-dark"  style="background-color: white">
                        <i class="fa fa-cog mr-3" aria-hidden="true"></i>Editar datos de cuenta
                    </a>

                </div>
            </div>
        </div>

        <div class="content w-100" style="background-color: #8DD7BF">
            <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: white">
                <div class="container-xl">

                    <div class="collapse navbar-collapse" id="navbarsExample07XL">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                            </li>
                        </ul>
                        <form action="{{route('logout')}}" method="POST" class="pr-3">
                            @csrf
                            <button type="submit" class="btn btn-danger" style="border: 2px solid black">
                                {{ __('Cerrar sesión') }}
                            </button>
                        </form>
                        @csrf
                        <a href="{{ route('edit.password') }}" class="btn btn-warning" style="border: 2px solid black">
                            <i class="fa fa-cog mr-3" aria-hidden="true"></i>Cambiar contraseña
                        </a>
                    </div>

                </div>
            </nav>
            <section class="p-3">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Editar datos de cuenta</h2>
                        </div>
                    </div>
                </div>
            </section>


        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" style="background-color: #ff828b">{{'Editar datos' }}</div>

                        <div class="card-body">
                            <form id="editClientForm" method="POST" action="{{ route('update.client', ['rut'=>Auth::user()->rut]) }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="rut" class="col-md-4 col-form-label text-md-end">{{ __('RUT') }}</label>

                                    <div class="col-md-6">
                                        <input id="rut" type="text" class="form-control @error('rut') is-invalid @enderror"
                                            name="rut" required autocomplete="rut" style="background-color: #ffffff" value={{Auth::user()->rut}} autofocus disabled>

                                        @error('rut')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" required autocomplete="name" value={{Auth::user()->name}} autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="row mb-3">
                                    <label for="last_name" class="col-md-4 col-form-label text-md-end">{{ __('Apellido') }}</label>

                                    <div class="col-md-6">
                                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                                            name="last_name" value="{{ Auth::user()->last_name }}" required autocomplete="last_name" autofocus>

                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ Auth::user()->email }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Dirección') }}</label>

                                    <div class="col-md-6">
                                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                                            name="address" value="{{ Auth::user()->address }}" required autocomplete="address" autofocus>

                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Teléfono') }}</label>

                                    <div class="col-md-6">
                                        <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror"
                                            name="phone" value="{{ Auth::user()->phone }}" required autocomplete="phone" autofocus>

                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-dark" style="background-color: #ff828b" onclick="ConfirmationPopUp('editClientForm')">{{ __('Editar') }}</button>
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

    </div>


<!---Alerta de exito o fracaso--->
@if (session()->has('emailError'))
<script>
    swal("¡Correo electrónico duplicado!", "Este correo electrónico ya está registrado en el sistema.", "error");
</script>
@endif
<!---Alerta de exito o fracaso--->


</body>

</html>
