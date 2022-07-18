<head>
    <title>FashionDog - Panel de Cliente</title>
    <link rel="icon" type="image/x-icon" href="../../../assets/FashionDogLogo.ico" />
    <script src="../js/scripts.js"></script>
</head>

<body>
    @include('layouts/navbar')

    @php
        $selectedId;
    @endphp
    <div class="content">
        <section class="p-3">
            <h1>Servicio con ID: {{ $dataId }} </h1>

            <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col">
                    <div class="card">
                        <h3 style="background-color: #ff828b">DATOS CLIENTE</h3>
                        <div class="card-body">
                            <p style="font-size: 20px">Nombre: {{ $clientData[0]->name }}
                                {{ $clientData[0]->last_name }}</p>
                            <p style="font-size: 20px">Rut: {{ $clientData[0]->rut }}</p>
                            <p style="font-size: 20px">Telefono: {{ $clientData[0]->phone }}</p>
                            <p style="font-size: 20px">email: {{ $clientData[0]->email }}</p>
                            <p style="font-size: 20px">Dirección: {{ $clientData[0]->address }}</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <h3 style="background-color: #ff828b">DATOS SOLICITUD</h3>
                        <div class="card-body">
                            <p style="font-size: 20px">ID: {{ $clientRequestData[0]->id }}</p>
                            <p style="font-size: 20px">Estado: {{ $clientRequestData[0]->status }}</p>
                            <p style="font-size: 20px">Fecha: {{ $clientRequestData[0]->date }}</p>

                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <h3 style="background-color: #ff828b">DATOS ESTILISTA</h1>
                            <div class="card-body">
                                @if (count($serviceData) == 0)

                                <p style="font-size: 20px">Aun no se ha tomado por ningun estilista</p>

                                @else
                                <p style="font-size: 20px">Nombre: {{ $stylistData[0]->name }}
                                    {{ $stylistData[0]->last_name }}</p>
                                <p style="font-size: 20px">Rut: {{ $stylistData[0]->rut }}</p>
                                <p style="font-size: 20px">Telefono: {{ $stylistData[0]->phone }}</p>
                                <p style="font-size: 20px">email: {{ $stylistData[0]->email }}</p>

                                @endif
                            </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <h3 style="background-color: #ff828b">COMENTARIO DEL SERVICIO</h3>
                        <div class="card-body">
                            @if (count($serviceData) == 0)

                            <p style="font-size: 20px">Aun no se hace el servicio</p>
                            @else
                            <p style="font-size: 20px">{{ $serviceData[0]->comment }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

</body>
