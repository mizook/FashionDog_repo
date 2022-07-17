<head>
    <title>FashionDog - Panel de Estilista</title>
    <link rel="icon" type="image/x-icon" href="../../../assets/FashionDogLogo.ico" />
    <!-- flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="../js/scripts.js"></script>
</head>

<body>
    @include('layouts.navbar')


    @if ($total_requests == 0)
    <script>
        swal("¡Sin solicitudes!", "No hay solicitudes para la fecha ingresada.", "error");
    </script>
    @endif


    <div class="content">
        <section class="p-3">
            <h1>Realizar servicio a domicilio</h1>

            <div class="container">
                <table class="table table-sm table-bordered" style="widht: 100%">
                    <thead style="background-color: #ff828b">
                        <tr style="color: white">
                            <th scope="col" style="text-align: center; width:9%;">#</th>
                            <th scope="col" style="text-align: center; width:9%;">RUT</th>
                            <th scope="col" style="text-align: center; width:9%;">Nombre</th>
                            <th scope="col" style="text-align: center; width:9%;">Apellido</th>
                            <th scope="col" style="text-align: center; width:9%;">Email</th>
                            <th scope="col" style="text-align: center; width:9%;">Dirección</th>
                            <th scope="col" style="text-align: center; width:9%;">Teléfono</th>

                            <th scope="col" style="text-align: center; width:9%;">N° Solicitud</th>
                            <th scope="col" style="text-align: center; width:9%;">Fecha y hora</th>
                            <th scope="col" style="text-align: center; width:9%;">Estado</th>
                            <th scope="col" style="text-align: center; width:10%;">Tomar Solicitud</th>
                        </tr>
                    </thead>

                    <tbody style="background-color: white">
                        @php $numero = 0 @endphp
                        @foreach ($filter_requests as $requestData)
                                @php $numero++ @endphp
                            <tr class="stylist-table">
                                <th scope="row" style="text-align: center; font-size: 90%">{{ $numero }}</th>
                                <td style="text-align: center; font-size: 90%">{{$requestData->rut}}</td>
                                <td style="text-align: center; font-size: 90%">{{$requestData->name}}</td>
                                <td style="text-align: center; font-size: 90%">{{$requestData->last_name}}</td>
                                <td style="text-align: center; font-size: 90%">{{$requestData->email}}</td>
                                <td style="text-align: center; font-size: 90%">{{$requestData->address}}</td>
                                <td style="text-align: center; font-size: 90%">{{$requestData->phone}}</td>

                                <td style="text-align: center; font-size: 90%">{{$requestData->id}}</td>
                                <td style="text-align: center; font-size: 90%">{{$requestData->date}}</td>
                                <td style="text-align: center; font-size: 90%">{{$requestData->status}}</td>
                                <td style="text-align: center; font-size: 90%">
                                    <div class="container stylist-table-options pt-1 pl-3">
                                        <form id="takeRequestForm_{{ $requestData->id }}" action="{{ route('stylist.takeRequest', ['requestDate'=>$requestData->date, 'requestId' => $requestData->id]) }}" method="POST" class="d-inline-block" >
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-block stylist-table-buttons d-flex" style="background-color: #4DD091;"
                                                onclick="ConfirmationPopUp('takeRequestForm_{{ $requestData->id }}')">
                                                <i class="fa fa-check mr-1" aria-hidden="true"></i>
                                                <h6 class="stylist-table-text">Tomar</h6>
                                            </button>
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

</html>


