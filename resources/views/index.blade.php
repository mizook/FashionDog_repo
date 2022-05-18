<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />


    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- Sweet Alerts -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i"
        rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />



    <title>Fashion Dog - Tu perro a la moda</title>
    <link rel="icon" type="image/x-icon" href="assets/FashionDogLogo.ico" />
</head>

<!-- Cuerpo -->
<body id="page-top" style=" background-color:#8DD7BF">
    <!--Barra de navegación-->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top" style="background-color: white">

        <!--Logo y texto-->
        <div class="container ">
            <img src="assets/img/FashionDogLogo.png" alt="" style="width: 50px">
            <a style="color: black" class="navbar-brand" href="#page-top">Bienvenido a Fashion dog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span
                    class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">

            <!--Opciones de la barra de navegación-->
                <div class="navbar-nav ms-auto">

                    @if (auth()->guard('administrator')->user() ||
                        auth()->guard('client')->user() ||
                        auth()->guard('stylist')->user())
                        <form action="{{ route('client.dashboard') }}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-info" style="border: 2px solid black">
                                {{ __('Panel de control') }}
                            </button>
                        </form>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger" style="border: 2px solid black">
                                {{ __('Cerrar sesión') }}
                            </button>
                        </form>
                    @else
                        <!-- Boton para activar el formulario de Inicio de sesión-->
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal"
                            style="border: 2px solid black">Iniciar sesión</button>
                        <!-- Boton para activar el formulario de Registro-->
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registerModal"
                            style="border: 2px solid black">Registrarse</a></button>
                    @endif

                </div>

            </div>
        </div>

    </nav>


<!-- Header-->
<header class="masthead text-center text-white" style="background-color:#8DD7BF">

    <div class="masthead-content">
        <div class="container px-5">
            <h1 class="masthead-heading mb-0 ml-2">Fashion Dog</h1>
            <div class="p-5"><img class="img-fluid rounded-circle" src="assets/img/03.jpg" alt="..." /></div>
        </div>
    </div>

</header>




<!-- Modal Form Login -->
<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Iniciar Sesión</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="rutLogin" class="col-md-4 col-form-label text-md-end">{{ __('RUT') }}</label>
                            <div class="col-md-6">
                                <input id="rutLogin" type="text" placeholder="Ej: 123456789"
                                    class="form-control @error('rutLogin') is-invalid @enderror" name="rutLogin"
                                    value="{{ old('rutLogin') }}" autofocus>

                                @error('rutLogin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="passwordLogin" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>
                            <div class="col-md-6">
                                <input id="passwordLogin" type="password" placeholder="Contraseña..."
                                    class="form-control @error('passwordLogin') is-invalid @enderror" name="passwordLogin">

                                @error('passwordLogin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">{{ __('Iniciar Sesión') }}</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>

    </div>
</div>


<!-- Modal Form Registro -->
<div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Registrar nuevo cliente</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="registerClientForm" action="{{ route('register') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <label for="rut" class="col-md-4 col-form-label text-md-end">{{ __('RUT') }}</label>
                    <div class="col-md-6">
                        <input id="rut" type="text" placeholder="Ej: 123456789"
                            class="form-control @error('rut') is-invalid @enderror" name="rut"
                            value="{{ old('rut') }}" autofocus>

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
                        <input id="name" type="text" placeholder="Nombre..."
                            class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" autofocus>

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
                        <input id="last_name" type="text" placeholder="Apellido..."
                            class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                            value="{{ old('last_name') }}">

                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo electrónico') }}</label>
                    <div class="col-md-6">
                        <input id="email" type="email" placeholder="ejemplo@ejemplo.com"
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}">

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
                        <input id="address" type="text" placeholder="Avenida ejemplo #123"
                            class="form-control @error('address') is-invalid @enderror" name="address"
                            value="{{ old('address') }}">

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
                        <input id="phone" type="number" placeholder="Ej: 987654321"
                            class="form-control @error('phone') is-invalid @enderror" name="phone"
                            value="{{ old('phone') }}">

                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>
                    <div class="col-md-6">
                        <input id="password" type="password" placeholder="Contraseña..."
                            class="form-control @error('password') is-invalid @enderror" name="password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password_confirmation" class="col-md-4 col-form-label text-md-end">{{ __('Confirmar contraseña') }}</label>
                    <div class="col-md-6">
                        <input id="password_confirmation" type="password" placeholder="Confirmar contraseña..."
                            class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" >

                        @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary" onclick="ConfirmationPopUp('registerClientForm')">Registrarse</button>
                </div>

            </form>
      </div>
    </div>
  </div>
</div>




<!-- Footer-->
<footer class="py-5 bg-black">
    <div class="container px-5">
        <p class="m-0 text-center text-white small">Copyright &copy; FashionDog 2022</p>
    </div>
</footer>



<!---Alerta de exito o fracaso--->
@if (session()->has('logoutMessage'))
<script>
    swal("¡Sesión finalizada!", "Has cerrado sesión con éxito.", "success");
</script>

@elseif (session()->has('loginError'))
<script>
    swal("¡Error!", "Las credenciales de acceso son incorrectas o el usuario no esta registrado en el sistema.", "error");
</script>

@elseif (session()->has('clientCreated'))
<script>
    swal("¡Cliente creado!", "¡Has creado tu cuenta con éxito!", "success");
</script>

@endif
<!---Alerta de exito o fracaso--->

<!-- Abrir Modal Form Login si hay algún error -->
@if($errors->get('rutLogin') || $errors->get('passwordLogin'))
    <script>
        var myModal = new bootstrap.Modal(document.getElementById('loginModal'), {})
        myModal.toggle()
    </script>
@endif

<!-- Abrir Modal Form Register si hay algún error -->
@if($errors->get('rut') || $errors->get('name') || $errors->get('last_name') || $errors->get('email') ||
    $errors->get('phone') || $errors->get('address') || $errors->get('password') || $errors->get('password_confirmation'))
        <script>
            var myModal = new bootstrap.Modal(document.getElementById('registerModal'), {})
            myModal.toggle()
        </script>
@endif

</body>

</html>
