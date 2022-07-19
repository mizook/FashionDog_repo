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
                        <h3 style="background-color: #ff828b; color: white">DATOS CLIENTE</h3>
                        <div class="card-body">
                            <p style="font-size: 20px">RUT: {{ $clientData[0]->rut }}</p>
                            <p style="font-size: 20px">Nombre: {{ $clientData[0]->name }}
                                {{ $clientData[0]->last_name }}</p>
                            <p style="font-size: 20px">Teléfono: {{ $clientData[0]->phone }}</p>
                            <p style="font-size: 20px">Email: {{ $clientData[0]->email }}</p>
                            <p style="font-size: 20px">Dirección: {{ $clientData[0]->address }}</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <h3 style="background-color: #ff828b; color: white">DATOS SOLICITUD</h3>
                        <div class="card-body">
                            <p style="font-size: 20px">ID: {{ $clientRequestData[0]->id }}</p>
                            <p style="font-size: 20px">Estado: {{ $clientRequestData[0]->status }}</p>
                            <p style="font-size: 20px">Fecha: {{ $clientRequestData[0]->date }}</p>

                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <h3 style="background-color: #ff828b; color: white">DATOS ESTILISTA</h1>
                            <div class="card-body">
                                @if (count($serviceData) == 0)

                                <p style="font-size: 20px">[MENSAJE DEL SISTEMA]</p>
                                <p style="font-size: 20px">Aún no se ha tomado por ningun estilista o fue anulada.</p>

                                @else
                                <p style="font-size: 20px">RUT: {{ $stylistData[0]->rut }}</p>
                                <p style="font-size: 20px">Nombre: {{ $stylistData[0]->name }}
                                    {{ $stylistData[0]->last_name }}</p>
                                <p style="font-size: 20px">Teléfono: {{ $stylistData[0]->phone }}</p>
                                <p style="font-size: 20px">Email: {{ $stylistData[0]->email }}</p>

                                @endif
                            </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <h3 style="background-color: #ff828b; color: white">COMENTARIO DEL SERVICIO</h3>
                        <div class="card-body">
                            @if (count($serviceData) == 0)

                            <p style="font-size: 20px">[MENSAJE DEL SISTEMA]</p>
                            <p style="font-size: 20px">Aún no se hace el servicio, fue anulada la solicitud o no se ha hecho un comentario.</p>
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
