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
@elseif (session()->has('clientError'))
<script>
    swal("¡Error!", "¡El cliente no existe!", "error");
</script>
@endif
<!---Alerta de exito o fracaso--->


</body>

</html>
