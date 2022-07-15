<head>
    <title>FashionDog - Panel de Cliente</title>
    <link rel="icon" type="image/x-icon" href="../../../assets/FashionDogLogo.ico" />
    <script src="../js/scripts.js"></script>
</head>

<body>
    @include('layouts/navbar')

    @if ($totalRequests == 0)
    <script>
        swal("¡Sin solicitudes!", "“No hay solicitudes por mostrar”.", "error");
    </script>
    @endif

    @if (session()->has('goodEditStatusRequest'))
        <script>
            swal("¡Solicitud anulada!", "La solicitud ha sido anulada con éxito.", "success");
        </script>
    @endif


    <div class="content">
        <section class="p-3">
            <h1>Administrar Solicitudes</h1>

            <div class="container">
                <table class="table table-sm table-bordered">
                    <thead style="background-color: #ff828b">
                        <tr style="color: white">
                            <th scope="col" style="text-align: center">#</th>
                            <th scope="col" style="text-align: center">Fecha y hora</th>
                            <th scope="col" style="text-align: center">N°</th>
                            <th scope="col" style="text-align: center">Estado</th>
                            <th scope="col" style="text-align: center">Nombre del cliente</th>
                            <th scope="col" style="text-align: center">VER</th>

                        </tr>
                    </thead>

                    <tbody style="background-color: white">
                        @php $numero = 0 @endphp
                        @php $clientDataPos = -1 @endphp
                        @foreach ($clientRequestsData as $requestData)
                                @php $clientDataPos++ @endphp
                                @php $numero++ @endphp
                            <tr class="stylist-table">
                                <th scope="row" style="text-align: center">{{ $numero }}</th>
                                <td style="text-align: center">{{$requestData->date}}</td>
                                <td style="text-align: center">{{$requestData->id}}</td>
                                <td style="text-align: center">{{$requestData->status}}</td>
                                <td style="text-align: center">{{$clientData[$clientDataPos]->name}}</td>
                                <td style="text-align: center">
                                        <button class="btn btn-warning" style="background-color: #FFD872" type="submit">
                                            <i class="fa fa-eye" aria-hidden="true"></i> Ver
                                        </button>
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
