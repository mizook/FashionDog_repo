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
                    @if (Route::has('login'))
                    <div class="navbar-nav ms-auto">
                        @auth
                          <button type="button"  class="btn"> <a href="{{ url('/home') }}" class="button ">Inicio </a></button>

                        @else
                            <button type="button"  class="btn"><a href="{{ route('login') }}" class="button " style="color: black">Iniciar sesión</button>
                            @if (Route::has('register'))
                            <button type="button"  class="btn"><a href="{{ route('register') }}" class="button " style="color: black">Registrarse</a></button>

                    @endif
                        @endauth
                    </div>
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
