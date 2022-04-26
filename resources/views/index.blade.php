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
        <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />

        <title>Fashion Dog - Tu perro a la moda</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    </head>


    <body id="page-top" style=" background-color:#8DD7BF">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top" style="background-color: white">
            <div class="container ">
                 <img src="assets/img/04.jpg" alt="" style="width: 50px">
                <a style="color: black" class="navbar-brand" href="#page-top">Bienvenido a Fashion dog</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <!--
                        <div class="navbar-nav ms-auto">
                        <div>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reg-modal"> Registrarse</button>
                        </div>
                        @auth
                            <h1>Estas loggeado</h1>
                        @endauth

                        @guest
                            <h1>No estas loggeado</h1>
                        @endguest

                    </div>

                    -->

                    <div class="navbar-nav ms-auto">
                        <!-- Boton para activar el formulario de registro-->
                        <div>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reg-modal"> Registrarse</button>
                        </div>
                        <!-- Boton para activar el formulario de registro-->

                    </div>
                    @if (Route::has('login'))
                        @auth
                          <button type="button"  class="btn"> <a href="{{ url('/home') }}" class="button ">Inicio </a></button>

<<<<<<< HEAD
                        @else
                            <button type="button"  class="btn"><a href="{{ route('login') }}" class="button " style="color: black">Iniciar sesión</button>
                            @if (Route::has('register'))
                            <button type="button"  class="btn"><a href="{{ route('register') }}" class="button " style="color: black">Registrarse</a></button>
=======

                    @else
                            <button type="button" class="btn"><a href="{{ route('login') }}" class="button ">Iniciar sesión</button>
                            @if (Route::has('register'))
                                <button type="button" class="btn"><a href="{{ route('register') }}" class="button ">Registrarse</a></button>
>>>>>>> main

                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="masthead text-center text-white" style="background-color:#8DD7BF" >
            <div class="masthead-content"  >
                <div class="container px-5">
                    <h1 class="masthead-heading mb-0">Fashion Dog</h1>
                    <h2 class="masthead-subheading mb-0">Un perro a la moda</h2>
                    <a class="btn btn-primary btn-xl rounded-pill mt-5"  href="#scroll">Más</a>
                </div>
            </div>
        </header>
        <!-- Content section 1-->
<section id="scroll">
    <div class="container px-5">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-6 order-lg-2">
                <div class="p-5"><img class="img-fluid rounded-circle" src="assets/img/01.jpg" alt="..." /></div>
            </div>
            <div class="col-lg-6 order-lg-1">
                <div class="p-5">
                    <h2 class="display-4">Para los amantes de los perros...</h2>
                    <p>Si quieres que tu perro pase un buen momento esta es tu solucion</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Content section 2-->
<section>
    <div class="container px-5">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-6">
                <div class="p-5"><img class="img-fluid rounded-circle" src="assets/img/02.jpg" alt="..." /></div>
            </div>
            <div class="col-lg-6">
                <div class="p-5">
                    <h2 class="display-4">Entregamos el mejor cuidado!</h2>
                    <p>Con los mejores profesionales al alcance de tu mano.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Content section 3-->
<section>
    <div class="container px-5">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-6 order-lg-2">
                <div class="p-5"><img class="img-fluid rounded-circle" src="assets/img/03.jpg" alt="..." /></div>
            </div>
            <div class="col-lg-6 order-lg-1">
                <div class="p-5">
                    <h2 class="display-4">Experiencia pensada para el disfrute de tu mascota</h2>
                    <p>Que tu mascota no se estrese mas , aqui lo trataremos como un verdadero rey.</p>
                </div>
            </div>
        </div>
    </div>
        </section>

        <!-- Boton para activar el formulario de registro-->

        <!--Formulario de registro modal-->
        <div class="modal fade" id="reg-modal" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-title"> Registrarse</h5>
                    </div>
                    <div class="modal-body">
                        <form action="/register" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="rut" class="col-md-4 col-form-label text-md-end">{{ __('Rut') }}</label>

                                <div class="col-md-6">
                                    <input id="rut" type="text" class="form-control @error('rut') is-invalid @enderror" name="rut" value="{{ old('rut') }}" required autocomplete="Ej: 12345678K" autofocus>

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
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="Nombre" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="last name" class="col-md-4 col-form-label text-md-end">{{ __('Apellido') }}</label>

                                <div class="col-md-6">
                                    <input id="last name" type="last name" class="form-control @error('last name') is-invalid @enderror" name="last_name" required autocomplete="last name">

                                    @error('last name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Direccion" class="col-md-4 col-form-label text-md-end">{{ __('Dirección') }}</label>

                                <div class="col-md-6">
                                    <input id="Direccion" type="Direccion" class="form-control @error('Direccion') is-invalid @enderror" name="address" required autocomplete="Direccion">

                                    @error('Direccion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="Telefono" class="col-md-4 col-form-label text-md-end">{{ __('Teléfono') }}</label>

                                <div class="col-md-6">
                                    <input id="Telefono" type="Telefono" class="form-control @error('Telefono') is-invalid @enderror" name="phone" required autocomplete="Telefono">

                                    @error('Telefono')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmar Contraseña') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <button class="btn btn-primary" >Registrarse</button>
                        </form>

                    </div>
                    <div class="modal-footer">
                        FashionDog &copy;
                    </div>
                </div>
            </div>
        </div>





        <!-- Footer-->
        <footer class="py-5 bg-black">
            <div class="container px-5"><p class="m-0 text-center text-white small">Copyright &copy; FashionDog 2022</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
