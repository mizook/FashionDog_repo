<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <title>Administrar estilistas</title>
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
  <div class="d-flex">
    <div id="sidebar" style="background-color: white" >
      <div class="p-2">
        <a href="{{ route('admin.dashboard') }}" class="navbar-brand text-center text-dark w-100 p-4">
            ¡Bienvenido! <br> RUT: {{ Auth::user()->rut }}
        </a>
      </div>
      <div id="sidebar-accordion" class="accordion" style="background-color: white" >
        <div class="list-group">

          <a href="{{ route('admin.stylists') }}" class="list-group-item list-group-item-action  text-dark" style="background-color: white">
            <i class="fa fa-tachometer mr-3" aria-hidden="true"></i>Administral Estilistas
          </a>

          <a href="#profile-items" data-toggle="collapse" aria-expanded="false"
            class="list-group-item list-group-item-action text-dark"  style="background-color: white">
            <i class="fa fa-user mr-3" aria-hidden="true"></i>Habilitar Usuarios
          </a>
          <div id="profile-items" class="collapse" data-parent="#sidebar-accordion">
            <a href="#" class="list-group-item list-group-item-action text-dark pl-5"  style="background-color: white">
              Habilitar
            </a>
            <a href="#" class="list-group-item list-group-item-action text-dark pl-5"  style="background-color: white">
              Desabilitar
            </a>
          </div>

          <a href="#" class="list-group-item list-group-item-action  text-dark"  style="background-color: white">
            <i class="fa fa-shopping-cart mr-3" aria-hidden="true"></i>Administrar Solicitudes
          </a>

          <a href="#setting-items" data-toggle="collapse" aria-expanded="false"
            class="list-group-item list-group-item-action  text-dark"  style="background-color: white">
            <i class="fa fa-cog mr-3" aria-hidden="true"></i>Configuración
          </a>
          <div id="setting-items" class="collapse" data-parent="#sidebar-accordion">
            <div class="d-flex flex-row text-center">
              <a href="#" class="list-group-item list-group-item-action  text-dark"  style="background-color: white">
                Cambiar contraseña
              </a>
              <a href="#" class="list-group-item list-group-item-action text-dark"  style="background-color: white">
                Item 2
              </a>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="content w-100"  style="background-color: #8DD7BF">
      <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: white">
        <div class="container-xl">

          <div class="collapse navbar-collapse" id="navbarsExample07XL">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
              </li>
            </ul>
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger" style="border: 2px solid black">
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
              <h2>Administrar Estilistas</h2>
            </div>
          </div>
        </div>
        <form action="" method="GET" class="text-right mr-3 pr-5">
            @csrf
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addStylist" style="border: 2px solid black">Agregar Estilista</button>
        </form>
      </section>



      <table class="table table-bordered table-dark">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Rut</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Correo</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Estatus</th>
            <th scope="col"></th>

          </tr>
        </thead>
        <tbody>
            {{$numero=0}}
            @foreach ($stylists as $stylist)
            {{$numero++}}
                <tr>
                    <th scope="row">{{$numero}}</th>
                    <td>{{$stylist->rut}}</td>
                    <td>{{$stylist->name}}</td>
                    <td>{{$stylist->last_name}}</td>
                    <td>{{$stylist->email}}</td>
                    <td>{{$stylist->phone}}</td>
                    <td>{{$stylist->status}}</td>
                    <td>
                        @csrf
                        <button type="button" class="btn btn-danger">Desactivar</button>
                        <a href="{{ route('edit.stylist', ['rut'=>$stylist->rut]) }}" class="btn btn-success">Cambiar Datos</a>
                    </td>
                </tr>
            @endforeach
            {{$numero=0}}

        </tbody>
      </table>

    </div>
  </div>

<!--Formulario de registro modal Estilista-->
<div class="modal fade" id="addStylist" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Registrar nuevo Estilista</h5>
            </div>
            <div class="modal-body">
                <form action="/handleStylists" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label for="rut" class="col-md-4 col-form-label text-md-end">{{ __('RUT') }}</label>

                        <div class="col-md-6">
                            <input id="rut" type="text" placeholder="Ej: 123456789" class="form-control @error('rut') is-invalid @enderror" name="rut" value="{{ old('rut') }}" required autocomplete="Ej: 12345678K" autofocus>

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
                            <input id="name" type="text" placeholder="Nombre..." class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="Nombre" autofocus>

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
                            <input id="last_name" type="text" placeholder="Apellido..." class="form-control @error('last_name') is-invalid @enderror" name="last_name" required autocomplete="last_name">

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
                            <input id="email" type="email" placeholder="ejemplo@ejemplo.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label for="Telefono" class="col-md-4 col-form-label text-md-end">{{ __('Teléfono') }}</label>

                        <div class="col-md-6">
                            <input id="Telefono" type="Telefono" placeholder="Ej: 987654321" class="form-control @error('Telefono') is-invalid @enderror" name="phone" required autocomplete="Telefono">

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary" >Registrar</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>


<!--Editar datos del Estilista-->
<div class="modal fade" id="editStylist" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Editar datos del Estilista</h5>
            </div>
            <div class="modal-body">
                <form action="/handleStylist" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label for="rut" class="col-md-4 col-form-label text-md-end">{{ __('RUT') }}</label>

                        <div class="col-md-6">
                            <input id="rut" type="text" placeholder="Ej: 123456789" class="form-control @error('rut') is-invalid @enderror" name="rut" value="{{ $stylist->rut }}" required autocomplete="Ej: 12345678K" autofocus disabled>

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
                            <input id="name" type="text" placeholder="Nombre..." class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $stylist->name }}" required autocomplete="Nombre" autofocus>

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
                            <input id="last_name" type="text" placeholder="Apellido..." class="form-control @error('last_name') is-invalid @enderror" name="last_name" required autocomplete="last_name">

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
                            <input id="email" type="email" placeholder="ejemplo@ejemplo.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label for="Telefono" class="col-md-4 col-form-label text-md-end">{{ __('Teléfono') }}</label>

                        <div class="col-md-6">
                            <input id="Telefono" type="Telefono" placeholder="Ej: 987654321" class="form-control @error('Telefono') is-invalid @enderror" name="phone" required autocomplete="Telefono">

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary" >Editar</button>
                    </div>

                </form>

            </div>
        </div>
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
