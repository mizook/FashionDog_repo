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


@if (session()->has('clientError'))
<script>
    swal("¡Error!", "¡El cliente no existe!", "error");
</script>
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
@elseif (session()->has('userNotFind'))
<script>
    swal("¡El usuario no existe!", "El RUT ingresado no está en el sistema.", "error");
</script>
@endif

</body>




</html>
