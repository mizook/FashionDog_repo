<head>
    <title>FashionDog - Panel de Cliente</title>
    <link rel="icon" type="image/x-icon" href="../../../assets/FashionDogLogo.ico" />
    <script src="../js/scripts.js"></script>
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
                        <tr style="color: white">
                            <th scope="col" style="text-align: center">#</th>
                            <th scope="col" style="text-align: center">Fecha y hora</th>
                            <th scope="col" style="text-align: center">N°</th>
                            <th scope="col" style="text-align: center">Estado</th>
                            <th scope="col" style="text-align: center">Nombre estilista</th>
                            <th scope="col" style="text-align: center">Comentario</th>
                            <th scope="col" style="text-align: center">ANULAR</th>

                        </tr>
                    </thead>

                    <tbody style="background-color: white">
                        @php
                        $numero = 0
                        @endphp
                        @php
                        $numero2 = 0
                        @endphp
                        @foreach ($clientRequestsData as $requestData)
                            @php $numero++ @endphp
                            @php $stylistData =DB::select('select name,last_name from stylists inner join services on stylists.rut=services.stylist_rut where services.request_id=?',[$requestData->id]) @endphp
                            <tr class="stylist-table">
                                <th scope="row" style="text-align: center; width: 5%">{{ $numero }}</th>
                                <td style="text-align: center; width: 15%">{{$requestData->date}}</td>
                                <td style="text-align: center; width: 15%">{{$requestData->id}}</td>
                                <td style="text-align: center; width: 15%">{{$requestData->status}}</td>
                                @if($requestData->status != "INGRESADA" && $requestData->status != "ANULADA")
                                <td style="text-align: center; width: 15%">{{$allData[$allData->count()-$numero2-1]->name}} {{$allData[$allData->count()-$numero2-1]->last_name}}</td>
                                <td style="text-align: center; width: 15%">
                                    <form id="requestComment_{{ $requestData->id }}" action="{{ route('client.comment_page', ['id' => $requestData->id]) }}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-success stylist-table-buttons d-flex ml-4" style="background-color: #4DD091">
                                            <i class="fa fa-comment mr-1" aria-hidden="true"></i>
                                            <h6 class="stylist-table-text">Comentario</h6>
                                        </button>
                                    </form>
                                </td>
                                @php $numero2++ @endphp
                                @else
                                <td style="text-align: center"></td>
                                <td style="text-align: center"></td>
                                @endif
                                <td style="text-align: center; width: 20%">
                                    <div class="container stylist-table-options">
                                        <form id="cancelRequestForm_{{ $requestData->id }}"
                                            action="{{ route('changeRequestStatus', ['id' => $requestData->id]) }}"
                                            method="POST" class="d-inline-block">
                                            @csrf
                                            @if ($requestData->status == 'INGRESADA')
                                            <button type="submit" class="btn btn-danger btn-block stylist-table-buttons d-flex" style="background-color: #FC6238" onclick="ConfirmationPopUp('cancelRequestForm_{{ $requestData->id }}')">
                                                <i class="fa fa-times mr-3" aria-hidden="true"></i>
                                                <h6 class="stylist-table-text">Anular solicitud</h6>
                                            </button>
                                            @else
                                            <button type="submit" class="btn btn-danger btn-block stylist-table-buttons d-flex" style="background-color: #FC6238" disabled>
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
