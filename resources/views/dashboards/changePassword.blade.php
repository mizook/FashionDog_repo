<head>
    <title>FashionDog - Cambio de contraseña</title>
    <link rel="icon" type="image/x-icon" href="../assets/FashionDogLogo.ico" />
</head>

<body>
    @include('layouts.navbar')

    <div class="content">
        <section class="p-3">
            <h1>Cambiar contraseña</h1>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header" style="background-color: #ff828b">{{'Cambiar contraseña' }}</div>
                                <div class="card-body">
                                    <form id="changePasswordForm" method="POST" action="{{ route('update.password', ['rut'=>Auth::user()->rut]) }}">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" placeholder="Nueva contraseña..." class="form-control @error('password') is-invalid @enderror" name="password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="confirm_password" class="col-md-4 col-form-label text-md-end">{{ __('Confirmar contraseña') }}</label>

                                            <div class="col-md-6">
                                                <input id="confirm_password" type="password" placeholder="Confirmar contraseña..." class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password">
                                                @error('confirm_password')
                                                    <span class="invalid-feedback" style="margin-right: 50%" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" style="background-color: #ff828b" class="btn btn-dark" onclick="ConfirmationPopUp('changePasswordForm')">
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
