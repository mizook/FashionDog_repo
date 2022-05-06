<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Sweet Alerts -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../js/scripts.js"></script>

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
    <link rel="icon" type="image/x-icon" href="../assets/FashionDogLogo.ico" />
</head>

<body>
    <div class="d-flex">
        <div id="sidebar" style="background-color: white">
            <div id="topSideBar" class="p-2">
                <div class="d-inline-block">
                    <img class="pb-5" src="../assets/img/FashionDogLogo.png" alt="" style="width: 100px">
                </div>
                <div class="d-inline-block pt-5">
                    <a href="{{ route('admin.dashboard') }}" class="navbar-brand text-center text-dark w-100 p-4">
                        Administrar<br> {{ Auth::user()->rut }}
                    </a>
                </div>
            </div>
            <div id="sidebar-accordion" class="accordion" style="background-color: white">
                <div class="list-group">

                    <a href="{{ route('admin.stylists') }}"
                        class="list-group-item list-group-item-action  text-dark" style="background-color: white">
                        <i class="fa fa-tachometer mr-3" aria-hidden="true"></i>Administral Estilistas
                    </a>

                    <a href="{{ route('admin.dashboard') }}"
                        class="list-group-item list-group-item-action text-dark" style="background-color: white">
                        <i class="fa fa-user mr-3" aria-hidden="true"></i>Habilitar Usuarios
                    </a>

                    <a href="{{ route('admin.dashboard') }}"
                        class="list-group-item list-group-item-action  text-dark" style="background-color: white">
                        <i class="fa fa-shopping-cart mr-3" aria-hidden="true"></i>Administrar Solicitudes
                    </a>

                    <a href="{{ route('admin.dashboard') }}"
                        class="list-group-item list-group-item-action  text-dark" style="background-color: white">
                        <i class="fa fa-cog mr-3" aria-hidden="true"></i>Configuración
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
                        <form action="{{ route('logout') }}" method="POST" class="pr-3">
                            @csrf
                            <button type="submit" class="btn btn-danger" style="border: 2px solid black">
                                {{ __('Cerrar sesión') }}
                            </button>
                        </form>
                        @csrf
                        <a href="{{ route('edit.password') }}" class="btn btn-warning"
                            style="border: 2px solid black">
                            <i class="fa fa-cog mr-3" aria-hidden="true"></i>Cambiar contraseña
                        </a>
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
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addStylist"
                        style="border: 2px solid black">Agregar Estilista</button>
                </form>
            </section>



            <table class="table table-bordered table-dark" style="border: 4px solid black">
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
                    @php $numero = 0 @endphp
                    @foreach ($stylists as $stylist)
                            @php $numero++ @endphp
                        <tr>
                            <th scope="row">{{ $numero }}</th>
                            <td>{{ $stylist->rut }}</td>
                            <td>{{ $stylist->name }}</td>
                            <td>{{ $stylist->last_name }}</td>
                            <td>{{ $stylist->email }}</td>
                            <td>{{ $stylist->phone }}</td>
                            <td>
                                @if ($stylist->status == 1)
                                    Activo
                                @elseif($stylist->status == 0)
                                    No activo
                                @endif

                            </td>
                            <td>

                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <form action="/admin/estilistas/cambiarEstado/{{ $stylist->rut }}"
                                                method="POST">
                                                @csrf
                                                @if ($stylist->status == 1)
                                                    <button type="submit" class="btn btn-danger btn-block" style="border: 2px solid black">Desactivar</button>
                                                @elseif($stylist->status == 0)
                                                    <button type="submit" class="btn btn-primary btn-block" style="border: 2px solid black">Activar</button>
                                                @endif

                                            </form>
                                        </div>
                                        <div class="col">
                                            <a href="{{ route('edit.stylist', ['rut' => $stylist->rut]) }}"
                                                class="btn btn-success" style="border: 2px solid black">Cambiar Datos</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    @php $numero = 0 @endphp

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
                <form id="addStylistForm" action="{{ route('store.stylist') }}" method="POST">
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
                        <label for="last_name"
                            class="col-md-4 col-form-label text-md-end">{{ __('Apellido') }}</label>

                        <div class="col-md-6">
                            <input id="last_name" type="text" placeholder="Apellido..."
                                class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                value="{{old('last_name')}}" autofocus>

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
                                value="{{ old('email') }}" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label for="phone"
                            class="col-md-4 col-form-label text-md-end">{{ __('Teléfono') }}</label>

                        <div class="col-md-6">
                            <input id="phone" type="number" placeholder="Ej: 987654321"
                                class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{old('phone')}}">

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary" onclick="ConfirmationPopUp('addStylistForm')">Registrar</button>
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


@if (session()->has('goodAddStylist'))
<script>
    swal("Estilista agregado!", "El estilista se creó con éxito.", "success");
</script>
@elseif (session()->has('goodEditStylist'))
<script>
    swal("Datos actualizados!", "Los datos se guardaron con éxito.", "success");
</script>
@elseif (session()->has('goodEditStatusStylist'))
<script>
    swal("Estatus actualizado!", "Se cambio el estatus del estilista con éxito.", "success");
</script>
@elseif (session()->has('emailError'))
<script>
    swal("Email duplicado!", "Este email ya está registrado en el sistema.", "error");
</script>
@endif


<!-- Abrir Modal Form Login si hay algún error -->
@if($errors->get('rut') || $errors->get('name') || $errors->get('last_name') || $errors->get('email') || $errors->get('phone'))
    <script>
        var myModal = new bootstrap.Modal(document.getElementById('addStylist'), {})
        myModal.toggle()
    </script>
@endif

</body>

</html>
