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
@endif

</body>

</html>
