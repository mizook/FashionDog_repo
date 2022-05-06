<!doctype html>
<html lang="en">

<head>
    <script>
        //Cuadro de diálogo de confirmación en JavaScript
        function AREYOUSURE ()
        {
           return confirm("¿Está seguro?");
        }
  </script>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <title>Cambiar contraseña</title>
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
                    <img class="pb-5" src="assets/img/FashionDogLogo.png" alt="" style="width: 100px">
                </div>
                <div class="d-inline-block pt-5">
                    <a href="{{ route('client.dashboard') }}" class="navbar-brand text-center text-dark w-100 p-4">
                        Cuenta RUT <br> {{ Auth::user()->rut }}
                    </a>
                </div>
            </div>

          <div id="sidebar-accordion" class="accordion" style="background-color: white" >
            <div class="list-group" >
                <a href="{{ route('client.dashboard') }}" class="list-group-item list-group-item-action  text-dark" style="background-color: white">
                    <i class="fa fa-tachometer mr-3" aria-hidden="true"></i>Inicio
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
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger" style="background-color: #FF5768" style="border: 2px solid black">
                            {{ __('Cerrar sesión') }}
                        </button>
                    </form>
                  </div>

            </div>
          </nav>
          <section class="p-3">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <h2>Cambiar contraseña</h2>
                </div>
              </div>
            </div>
          </section>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{'Cambiar contraseña' }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('update.password', ['rut'=>Auth::user()->rut]) }}">
                                @csrf
                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" placeholder="Nueva contraseña..." class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="confirm_password" class="col-md-4 col-form-label text-md-end">{{ __('Confirmar Contraseña') }}</label>

                                    <div class="col-md-6">
                                        <input id="confirm_password" type="password" placeholder="Confirmar contraseña..." class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" required autocomplete="new-password">
                                        @error('confirm_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-success" style="background-color: #FF5768" onclick="return AREYOUSURE()">
                                            {{ __('Cambiar contraseña') }}
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      </section>
    </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
  </script>
</body>

</html>
