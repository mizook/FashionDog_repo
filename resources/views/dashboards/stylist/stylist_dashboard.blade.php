<head>
    <title>FashionDog - Panel de Estilista</title>
    <link rel="icon" type="image/x-icon" href="../../../assets/FashionDogLogo.ico" />
</head>

<body>
    @include('layouts.navbar')

    <div class="content">
        <section class="p-3">
            <div class="container">
                <h1>Panel Estilista</h1>
            </div>
        </section>

    </div>


@if (session()->has('requestTaken'))
<script>
    swal("¡Solicitud tomada!", "La solicitud ha sido tomada con éxito.", "success");
</script>
@endif

</body>




</html>
