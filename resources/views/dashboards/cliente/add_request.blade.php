<head>
    <title>FashionDog - Panel de Cliente</title>
    <link rel="icon" type="image/x-icon" href="../../../assets/FashionDogLogo.ico" />
    <!-- flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>

<body>
    @include('layouts.navbar')

    <div class="content">

    <section class="p-3">
            <h1>Solicitar nuevo servicio</h1>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header" style="background-color: #ff828b">{{'Escoge la fecha y hora en que deseas recibir el servicio' }}</div>

                            <div class="card-body">
                                <form id="createRequestForm" method="POST" action="{{ route('add.request.post', ['rut'=>Auth::user()->rut]) }}">
                                    @csrf

                                    <div class="row form-group">
                                        <label for="input_date" class ="col-md-4 col-form-label text-md-end">{{ __('Fecha') }}</label>
                                        <div class="col-sm-6"> 
                                            <input id="input_date" type="datetime-local" class="form-control @error('input_date') is-invalid @enderror"
                                                name="input_date" required>

                                            @error('input_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <label for="input_time" class ="col-md-4 col-form-label text-md-end">{{ __('Hora') }}</label>
                                        <div class="col-sm-6"> 
                                            <input id="input_time" type="datetime-local" class="form-control @error('input_date') is-invalid @enderror"
                                                name="input_time" required>

                                            @error('input_time')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-dark" style="background-color: #ff828b" onclick="ConfirmationPopUp('createRequestForm')">{{ __('Confirmar') }}</button>
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
<!-- flatpickr -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    config = {
        mode: "range",
        minDate: new Date().fp_incr(1),
        dateFormat: "d/m/Y"
    }

    flatpickr("input[id=input_date]", config);
</script>
<script>
    config = {
        noCalendar: true,
        enableTime: true,
        dateFormat: "H:i",
        time_24hr: true
    }

    flatpickr("input[id=input_time]", config);
</script>
<!---Alerta de exito o fracaso--->
@if (session()->has('goodEdit'))
<script>
    swal("¡Datos actualizados!", "Datos actualizados con éxito.", "success");
</script>
@elseif (session()->has('clientError'))
<script>
    swal("¡Error!", "¡El cliente no existe!", "error");
</script>
@endif
<!---Alerta de exito o fracaso--->


</body>

</html>
