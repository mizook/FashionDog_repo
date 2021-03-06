<head>
    <title>FashionDog - Panel de Cliente</title>
    <link rel="icon" type="image/x-icon" href="../../../assets/FashionDogLogo.ico" />
</head>

<body>
    @include('layouts.navbar')

    <div class="content">
        <section class="p-3">
            <h1>Panel de Cliente</h1>
        </section>

    </div>


<!---Alerta de exito o fracaso--->
@if (session()->has('goodEdit'))
<script>
    swal("¡Datos actualizados!", "Datos actualizados con éxito.", "success");
</script>
@elseif (session()->has('requestAdded'))
<script>
    swal("¡Solicitud realizada!", "Solicitud realizada con éxito.", "success");
</script>
@elseif (session()->has('clientError'))
<script>
    swal("¡Error!", "¡El cliente no existe!", "error");
</script>
@elseif (session()->has('requestError'))
<script>
    swal("¡Error!", "!Ya tienes una solicitud para ese día!", "error");
</script>
@elseif (session()->has('goodEditStatusRequest'))
<script>
    swal("¡Solicitud anulada!", "La solicitud ha sido anulada con éxito.", "success");
</script>
@elseif (session()->has('commentDone'))
<script>
    swal("¡Comentario añadido!", "Se ha comentado el servicio con éxito.", "success");
</script>


@endif
<!---Alerta de exito o fracaso--->


</body>

</html>
