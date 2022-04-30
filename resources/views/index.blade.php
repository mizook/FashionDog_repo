<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

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


<body id="page-top" style=" background-color:#8DD7BF">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top" style="background-color: white">
        <div class="container ">
            <img src="assets/img/FashionDogLogo.png" alt="" style="width: 50px">
            <a style="color: black" class="navbar-brand" href="#page-top">Bienvenido a Fashion dog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span
                    class="navbar-toggler-icon"></span></button>

            <div class="collapse navbar-collapse" id="navbarResponsive">

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
                        <!-- Boton para activar el formulario de registro-->
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registerModal"
                            style="border: 2px solid black">Registrarse</a></button>
                    @endif

                </div>
            </div>
        </div>

    </nav>

    <header class="masthead text-center text-white" style="background-color:#8DD7BF">
        <div class="masthead-content">

            <div class="container">
                <div class="row">
                  <div class="col">
                    <h1 class="bg-light border ms-auto masthead-heading mb-0">Fashion Dog</h1>
                  </div>
                  <div class="col">
                    <div class="p-5"><img class="img-fluid rounded-circle" src="assets/img/03.jpg" alt="..." />
                  </div>
                </div>
              </div>
        </div>
    </header>

    <!--Formulario de registro modal-->
    <div class="modal hide fade" id="registerModal" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                @if (old('rut'))
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                @endif
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Registrarse como cliente</h5>
                </div>
                <div class="modal-body">
                    <form action="/register" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="rut" class="col-md-4 col-form-label text-md-end">{{ __('RUT') }}</label>

                            <div class="col-md-6">
                                <input id="rut" type="text" placeholder="Ej: 123456789"
                                    class="form-control @error('rut') is-invalid @enderror" name="rut"
                                    value="{{ old('rut') }}" required autocomplete="Ej: 12345678K" autofocus>

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
                                    value="{{ old('name') }}" required autocomplete="Nombre" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="last name"
                                class="col-md-4 col-form-label text-md-end">{{ __('Apellido') }}</label>

                            <div class="col-md-6">
                                <input id="last name" type="last name" placeholder="Apellido..."
                                    class="form-control @error('last name') is-invalid @enderror" name="last_name"
                                    required autocomplete="last name">

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" placeholder="ejemplo@ejemplo.com"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Direccion"
                                class="col-md-4 col-form-label text-md-end">{{ __('Dirección') }}</label>

                            <div class="col-md-6">
                                <input id="Direccion" type="Direccion" placeholder="Avenida ejemplo #123"
                                    class="form-control @error('Direccion') is-invalid @enderror" name="address"
                                    required autocomplete="Direccion">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="Telefono"
                                class="col-md-4 col-form-label text-md-end">{{ __('Teléfono') }}</label>

                            <div class="col-md-6">
                                <input id="Telefono" type="Telefono" placeholder="Ej: 987654321"
                                    class="form-control @error('Telefono') is-invalid @enderror" name="phone" required
                                    autocomplete="Telefono">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" placeholder="Contraseña..."
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-end">{{ __('Confirmar Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" placeholder="Confirmar contraseña..."
                                    class="form-control" name="password_confirmation" required
                                    autocomplete="new-password">
                            </div>
                        </div>

                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Registrarse</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <!--Formulario de Inicio de sesión-->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                @if (old('loginRut'))
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                @endif
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title"> Iniciar Sesión</h5>
                </div>
                <div class="card">


                    <div class="card-body">
                        <form method="POST" action="/login">
                            @csrf

                            <div class="row mb-3">
                                <label for="loginRut"
                                    class="col-md-4 col-form-label text-md-end">{{ __('RUT') }}</label>

                                <div class="col-md-6">
                                    <input id="loginRut" type="text" placeholder="Ej: 123456789"
                                        class="form-control @error('loginRut') is-invalid @enderror" name="loginRut"
                                        value="{{ old('loginRut') }}" required autocomplete="loginRut" autofocus>

                                    @error('loginRut')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" placeholder="Contraseña..."
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
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
    </div>
    </div>




    <!-- Footer-->
    <footer class="py-5 bg-black">
        <div class="container px-5">
            <p class="m-0 text-center text-white small">Copyright &copy; FashionDog 2022</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    @if (old('rut'))
        <script>
            var myModal = new bootstrap.Modal(document.getElementById('registerModal'), {})
            myModal.toggle()
        </script>
    @elseif (old('loginRut'))
        <script>
            var myModal = new bootstrap.Modal(document.getElementById('loginModal'), {})
            myModal.toggle()
        </script>
    @endif
</body>

</html>
