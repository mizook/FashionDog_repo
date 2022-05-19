<head>
    <title>FashionDog - Panel de Admin</title>
    <link rel="icon" type="image/x-icon" href="../assets/FashionDogLogo.ico" />
</head>

<body>
    @include('layouts.navbar')

    <div class="content">

        <section class="p-3">
            <h1>Administrar Estilistas</h1>
            <form action="" method="GET" class="text-right mr-3 pr-5">
                @csrf
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#addStylist" style="border: 2px solid black">Agregar Estilista
                </button>
            </form>

            <div class="container">
                <table class="table table-sm table-bordered">
                    <thead style="background-color: #ff828b">
                        <tr>
                            <th scope="col" style="text-align: center">#</th>
                            <th scope="col" style="text-align: center">RUT</th>
                            <th scope="col" style="text-align: center">Nombre</th>
                            <th scope="col" style="text-align: center">Apellido</th>
                            <th scope="col" style="text-align: center">Correo electrónico</th>
                            <th scope="col" style="text-align: center">Teléfono</th>
                            <th scope="col" style="text-align: center">Estado</th>
                            <th scope="col" style="text-align: center">Opciones</th>

                        </tr>
                    </thead>

                    <tbody style="background-color: white">
                        @php $numero = 0 @endphp
                        @foreach ($stylists as $stylist)
                                @php $numero++ @endphp
                            <tr class="stylist-table">
                                <th scope="row" style="text-align: center">{{ $numero }}</th>
                                <td style="text-align: center">{{ $stylist->rut }}</td>
                                <td style="text-align: center">{{ $stylist->name }}</td>
                                <td style="text-align: center">{{ $stylist->last_name }}</td>
                                <td style="text-align: center">{{ $stylist->email }}</td>
                                <td style="text-align: center">{{ $stylist->phone }}</td>
                                <td style="text-align: center">
                                    @if ($stylist->status == 1)
                                        Activo
                                    @elseif($stylist->status == 0)
                                        No activo
                                    @endif

                                </td>
                                <td>

                                    <div class="container stylist-table-options">
                                        <form action="/admin/estilistas/cambiarEstado/{{ $stylist->rut }}" method="POST" class="d-inline-block">
                                            @csrf
                                            @if ($stylist->status == 1)
                                                <button type="submit" class="btn btn-danger btn-block stylist-table-buttons d-flex" style="background-color: #FC6238">
                                                    <i class="fa fa-times mr-3" aria-hidden="true"></i>
                                                    <h6 class="stylist-table-text">Desactivar</h6>
                                                </button>
                                            @elseif($stylist->status == 0)
                                                <button type="submit" class="btn btn-success btn-block stylist-table-buttons d-flex" style="background-color: #4DD091">
                                                    <i class="fa fa-check mr-3" aria-hidden="true"></i>
                                                    <h6 class="stylist-table-text">Activar</h6>
                                                </button>
                                            @endif

                                        </form>

                                        <form action="{{ route('edit.stylist', ['rut' => $stylist->rut]) }}" method="GET" class="d-inline-block">
                                            @csrf
                                            <button type="submit" class="btn btn-warning btn-block stylist-table-buttons d-flex" style="background-color: #FFD872">
                                                <i class="fa fa-pencil mr-3" aria-hidden="true"></i>
                                                <h6 class="stylist-table-text">Editar datos</h6>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        @php $numero = 0 @endphp

                    </tbody>
                </table>
            </div>

        </section>

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
    swal("¡Estilista agregado!", "El estilista se creó con éxito.", "success");
</script>
@elseif (session()->has('goodEditStylist'))
<script>
    swal("¡Datos actualizados!", "Los datos se guardaron con éxito.", "success");
</script>
@elseif (session()->has('goodEditStatusStylist'))
<script>
    swal("¡Estado actualizado!", "Se cambio el estatus del estilista con éxito.", "success");
</script>
@elseif (session()->has('emailError'))
<script>
    swal("¡Correo electrónico duplicado!", "Este correo electrónico ya está registrado en el sistema.", "error");
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
