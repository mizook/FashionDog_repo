<head>
    <title>FashionDog - Panel de Cliente</title>
    <link rel="icon" type="image/x-icon" href="../../../assets/FashionDogLogo.ico" />
</head>

<body>
    @include('layouts/navbar')

    @if ($totalRequests == 0)
    <script>
        swal("¡Sin solicitudes!", "Aun no ha ingresado ninguna solicitud de servicio.", "error");
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
                        <tr>
                            <th scope="col" style="text-align: center">#</th>
                            <th scope="col" style="text-align: center">Fecha y hora</th>
                            <th scope="col" style="text-align: center">N°</th>
                            <th scope="col" style="text-align: center">Estado</th>
                            <th scope="col" style="text-align: center">Nombre estilista</th>
                            <th scope="col" style="text-align: center">ANULAR</th>

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
                                <td style="text-align: center">
                                    <div class="container stylist-table-options">
                                        <form action="/cliente/cancelRequest/{{ $requestData->id }}" method="POST" class="d-inline-block">
                                            @csrf
                                            @if ($requestData->status == 'ANULADA')
                                            <button type="submit" class="btn btn-danger btn-block stylist-table-buttons d-flex" style="background-color: #FC6238" disabled>
                                                <i class="fa fa-times mr-3" aria-hidden="true"></i>
                                                <h6 class="stylist-table-text">Anular solicitud</h6>
                                            </button>
                                            @else
                                            <button type="submit" class="btn btn-danger btn-block stylist-table-buttons d-flex" style="background-color: #FC6238">
                                                <i class="fa fa-times mr-3" aria-hidden="true"></i>
                                                <h6 class="stylist-table-text">Anular solicitud</h6>
                                            </button>

                                            @endif
                                        </form>
                                    </div>
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
