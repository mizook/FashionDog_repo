<head>
    <title>FashionDog - Panel de Cliente</title>
    <link rel="icon" type="image/x-icon" href="../../../assets/FashionDogLogo.ico" />
</head>

<body>
    @include('layouts/navbar')

    <div class="content">

        <section class="p-3">
            <h1>Editar datos de cuenta</h1>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header" style="background-color: #ff828b">
                                <h5 style="color: white" class="pt-3">Editar Datos</h1>
                            </div>
                            <div class="card-body">
                                <form id="editClientForm" method="POST" action="{{ route('update.client', ['rut'=>Auth::user()->rut]) }}">
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="rut" class="col-md-4 col-form-label text-md-end">{{ __('RUT') }}</label>

                                        <div class="col-md-6">
                                            <input id="rut" type="text" class="form-control @error('rut') is-invalid @enderror"
                                                name="rut" required autocomplete="rut" style="background-color: #F2D4CC" value="{{Auth::user()->rut}}" autofocus disabled>

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
                                                name="name" required autocomplete="name" value="{{Auth::user()->name}}" autofocus>

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
                                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo electrónico') }}</label>

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

        </section>

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
