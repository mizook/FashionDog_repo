<head>
    <title>FashionDog - Panel de Admin</title>
    <link rel="icon" type="image/x-icon" href="../../../assets/FashionDogLogo.ico" />
</head>

<body>
    @include('layouts.navbar')

    <div class="content">
        <section class="p-3">
            <h1>Panel de control</h1>
        </section>
    </div>









<!-- Alertas -->
@if (session()->has('clientError'))
<script>
    swal("¡Error!", "¡El cliente no existe!", "error");
</script>

<!-- Alertas Deshabilitar/Habilitar usuario -->
@elseif (session()->has('enableClient'))
<script>
    swal("¡Cliente habilitado!", "El cliente ha sido habilitado con éxito.", "success");
</script>
@elseif (session()->has('disableClient'))
<script>
    swal("¡Cliente deshabilitado!", "El cliente ha sido deshabilitado con éxito.", "success");
</script>
@elseif (session()->has('enableStylist'))
<script>
    swal("¡Estilista habilitado!", "El estilista ha sido habilitado con éxito.", "success");
</script>
@elseif (session()->has('disableStylist'))
<script>
    swal("¡Estilista deshabilitado!", "El estilista ha sido deshabilitado con éxito.", "success");
</script>
@elseif (session()->has('disableUserError'))
<script>
    swal("¡Error!", "Error.", "error");
</script>
@elseif (session()->has('userNotFound'))
<script>
    swal("¡El usuario no existe!", "El RUT ingresado no existe en sistema o no es un cliente o estilista.", "error");
</script>
@endif




<!-- ModalForm de confirmación (deshabilitar/habilitar usuario) -->
<div class="modal fade" id="disableUserModal" tabindex="-1" role="dialog" aria-labelledby="disableUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header pt-2 pb-2" style="background-color: #ff828b">
                <h4 class="modal-title font-weight-bold" id="disableUserModalLabel">Habilitar/Deshabilitar Usuario</h4>
            </div>

            <form action="{{ route('changestatus.user', ['stylist' => session()->get('stylist'), 'client' => session()->get('client')]) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <h5 class="font-weight-bold mt-4 mb-4" style="text-align: center">

                        ¿Desea
                        @php
                            if(session()->get('stylist'))
                            {
                                if(session()->get('stylist')->status == 0)
                                {
                                    echo 'habilitar a ';
                                    echo session()->get('stylist')->name;
                                }
                                if(session()->get('stylist')->status == 1)
                                {
                                    echo 'desahabilitar a ';
                                    echo session()->get('stylist')->name;
                                }
                            }
                            if(session()->get('client'))
                            {
                                if(session()->get('client')->status == 0)
                                {
                                    echo 'habilitar a ';
                                    echo session()->get('client')->name;
                                }
                                if(session()->get('client')->status == 1)
                                {
                                    echo 'deshabilitar a ';
                                    echo session()->get('client')->name;
                                }
                            }
                        @endphp
                        del sistema
                        ?

                    </h5>

                </div>
                <div class="modal-footer">
                    <button type="button" style="background-color: #FC6238" class="btn btn-dark" data-dismiss="modal" aria-label="Close">Cancelar</button>
                    <!--<button type="button" style="background-color: #FC6238" class="btn btn-dark" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>-->
                    <button type="submit" style="background-color: #ff828b" class="btn btn-dark mr-5">
                        {{ __('OK') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Abrir ModalForm de confirmación (deshabilitar/habilitar usuario) -->
@if(session()->has('stylistFound'))
    <script>
        var myModal = new bootstrap.Modal(document.getElementById('disableUserModal'), {})
        myModal.toggle()
    </script>
@endif
@if(session()->has('clientFound'))
    <script>
        var myModal = new bootstrap.Modal(document.getElementById('disableUserModal'), {})
        myModal.toggle()
    </script>
@endif

</body>

</html>
