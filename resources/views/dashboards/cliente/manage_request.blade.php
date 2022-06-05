<head>
    <title>FashionDog - Panel de Cliente</title>
    <link rel="icon" type="image/x-icon" href="../../../assets/FashionDogLogo.ico" />
</head>

<body>
    @include('layouts/navbar')

    @php
        $totalRequests= DB::select('select COUNT(client_rut) from client_requests where client_rut = ?', [Auth::user()->rut]);
        if(  $totalRequests == 0){
            echo "NO TIENE NINGUNA SOLICITUD";
        }else {
            echo "SI TIENE SOLICITUD";
        }
    @endphp

    <div class="content">
        : fecha y hora de la solicitud, número de la solicitud, estado y nombre del
        estilista. Si la solicitud no ha sido atendida el campo “nombre del estilista” estará vacío.
        <section class="p-3">
            <h1>Administrar Solicitudes</h1>

            <div class="container">
                <table class="table table-sm table-bordered">
                    <thead style="background-color: #ff828b">
                        <tr>
                            <th scope="col" style="text-align: center">#</th>
                            <th scope="col" style="text-align: center">Fecha y hora</th>
                            <th scope="col" style="text-align: center">N°</th>
                            <th scope="col" style="text-align: center">Estado</th>
                            <th scope="col" style="text-align: center">Nombre estilista</th>
                            <th scope="col" style="text-align: center">campo1</th>
                            <th scope="col" style="text-align: center">campo2</th>
                            <th scope="col" style="text-align: center">campo3</th>

                        </tr>
                    </thead>

                    <tbody style="background-color: white">
                        @php $numero = 0 @endphp
                        @foreach ($clientRequestsData as $requestData)
                                @php $numero++ @endphp
                            <tr class="stylist-table">
                                <th scope="row" style="text-align: center">{{ $numero }}</th>
                                <td style="text-align: center">{{$requestData->date}}</td>
                                <td style="text-align: center">{{$requestData->id}}</td>
                                <td style="text-align: center">{{$requestData->status}}</td>
                                <td style="text-align: center"></td>
                                <td style="text-align: center">{{$requestData->client_rut}}</td>
                                <td style="text-align: center">
                                    @if (true)
                                        Activo
                                    @elseif(false)
                                        No activo
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                        @php $numero = 0 @endphp

                    </tbody>
                </table>
            </div>

        </section>

    </div>
</body>
