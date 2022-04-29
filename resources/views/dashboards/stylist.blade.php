<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <title>Hello, world!</title>
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
    <div id="sidebar" style="background-color: #74737a">
      <div class="p-2">
        <a href="#" class="navbar-brand text-center text-light w-100 p-4 border-bottom">
            Bienvenido {{Auth::user()->name}}!
        </a>
      </div>
      <div id="sidebar-accordion" class="accordion" style="background-color: #74737a" >
        <div class="list-group" >
          <a href="#dashboard-items" data-toggle="collapse" aria-expanded="false"
            class="list-group-item list-group-item-action  text-light" style="background-color: #74737a">
            <i class="fa fa-tachometer mr-3" aria-hidden="true"></i>Administral Estilista
          </a>
          <div id="dashboard-items" class="collapse" data-parent="#sidebar-accordion">
            <a href="#" class="list-group-item list-group-item-action  text-light pl-5"  style="background-color: #74737a">
              Agregar
            </a>
            <a href="#" class="list-group-item list-group-item-action text-light pl-5"  style="background-color: #74737a">
              Editar
            </a>
          </div>
          <a href="#profile-items" data-toggle="collapse" aria-expanded="false"
            class="list-group-item list-group-item-action text-light"  style="background-color: #74737a">
            <i class="fa fa-user mr-3" aria-hidden="true"></i>Habilitar Usuario
          </a>
          <div id="profile-items" class="collapse" data-parent="#sidebar-accordion">
            <a href="#" class="list-group-item list-group-item-action text-light pl-5"  style="background-color: #74737a">
              Habilitar
            </a>
            <a href="#" class="list-group-item list-group-item-action text-light pl-5"  style="background-color: #74737a">
              Desabilitar
            </a>
          </div>
          <a href="#" class="list-group-item list-group-item-action  text-light"  style="background-color: #74737a">
            <i class="fa fa-shopping-cart mr-3" aria-hidden="true"></i>Administrar Solicitudes
          </a>
          <a href="#setting-items" data-toggle="collapse" aria-expanded="false"
            class="list-group-item list-group-item-action  text-light"  style="background-color: #74737a">
            <i class="fa fa-cog mr-3" aria-hidden="true"></i>Configuracion
          </a>
          <div id="setting-items" class="collapse" data-parent="#sidebar-accordion">
            <div class="d-flex flex-row text-center">
              <a href="#" class="list-group-item list-group-item-action  text-light"  style="background-color: #74737a">
                Item 1
              </a>
              <a href="#" class="list-group-item list-group-item-action text-light"  style="background-color: #74737a">
                Item 2
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="content w-100">
      <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #74737a">
        <div class="container-xl">



          <div class="collapse navbar-collapse" id="navbarsExample07XL">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">

                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger" >
                        {{ __('Cerrar sesión') }}
                    </button>
                </form>
              </li>
            </ul>
            <form class="form-inline my-2 my-md-0">
              <input class="form-control" type="text" placeholder="Search" aria-label="Search">
            </form>
          </div>
        </div>
      </nav>
      <section class="p-3">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2>Fashion Dog</h2>
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
