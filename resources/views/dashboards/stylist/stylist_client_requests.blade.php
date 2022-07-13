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
            <h1>Realizar servicio a Domicilio</h1>

            <div class="container">
                <table class="table table-sm table-bordered">
                    <thead style="background-color: #ff828b">
                        <tr style="color: white">
                            <th scope="col" style="text-align: center">#</th>
                            <th scope="col" style="text-align: center">RUT</th>
                            <th scope="col" style="text-align: center">Nombre</th>
                            <th scope="col" style="text-align: center">Apellido</th>
                            <th scope="col" style="text-align: center">Email</th>
                            <th scope="col" style="text-align: center">Dirección</th>
                            <th scope="col" style="text-align: center">Teléfono</th>

                            <th scope="col" style="text-align: center">N° Solicitud</th>
                            <th scope="col" style="text-align: center">Fecha y hora</th>
                            <th scope="col" style="text-align: center">Estado</th>
                            <th scope="col" style="text-align: center">Tomar Solicitud</th>
                        </tr>
                    </thead>

                    <tbody style="background-color: white">
                        @php $numero = 0 @endphp
                        @foreach ($filter_requests as $requestData)
                                @php $numero++ @endphp
                            <tr class="stylist-table">
                                <th scope="row" style="text-align: center">{{ $numero }}</th>
                                <td style="text-align: center">{{$requestData->rut}}</td>
                                <td style="text-align: center">{{$requestData->name}}</td>
                                <td style="text-align: center">{{$requestData->last_name}}</td>
                                <td style="text-align: center">{{$requestData->email}}</td>
                                <td style="text-align: center">{{$requestData->address}}</td>
                                <td style="text-align: center">{{$requestData->phone}}</td>

                                <td style="text-align: center">{{$requestData->id}}</td>
                                <td style="text-align: center">{{$requestData->date}}</td>
                                <td style="text-align: center">{{$requestData->status}}</td>
                                <td style="text-align: center">
                                    <div class="container stylist-table-options">
                                        <form id="cancelRequestForm_{{ $requestData->id }}" action="{{ route('changeRequestStatus', ['id'=>$requestData->id]) }}" method="POST" class="d-inline-block" >
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-block stylist-table-buttons d-flex" style="background-color: #4DD091" onclick="ConfirmationPopUp('cancelRequestForm_{{ $requestData->id }}')">
                                                <i class="fa fa-check mr-3" aria-hidden="true"></i>
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


