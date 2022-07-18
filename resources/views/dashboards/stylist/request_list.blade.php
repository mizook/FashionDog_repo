<head>
    <title>FashionDog - Panel de Estilista</title>
    <link rel="icon" type="image/x-icon" href="../../../assets/FashionDogLogo.ico" />
    <script src="../js/scripts.js"></script>
</head>

<body>
    @include('layouts/navbar')

    @if ($requestsDone == 0)
    <script>
        swal("¡No hay servicios realizadas!", "Aun no realizado ningún servicio.", "error");
    </script>
    @endif

    @if (session()->has('goodEditStatusRequest'))
        <script>
            swal("¡Solicitud anulada!", "La solicitud ha sido anulada con éxito.", "success");
        </script>
    @endif


    <div class="content">
        <section class="p-3">
            <h1>Servicios Terminados</h1>

            <div class="container">
                <table class="table table-sm table-bordered">
                    <thead style="background-color: #ff828b">
                        <tr style="color: white">
                            <th scope="col" style="text-align: center">N°</th>
                            <th scope="col" style="text-align: center">Fecha y hora</th>
                            <th scope="col" style="text-align: center">Nombre cliente</th>
                            <th scope="col" style="text-align: center">Direccion cliente</th>
                            <th scope="col" style="text-align: center">Comentario</th>

                        </tr>
                    </thead>

                    <tbody style="background-color: white">
                        @php
                        $numero = 0
                        @endphp
                        @php
                        $numero2 = 0
                        @endphp
                        @foreach ($stylistRequestsData as $requestData)
                                @php $numero++ @endphp
                            <tr class="stylist-table">
                                <td style="text-align: center; width: 5%">{{$requestData->id}}</td>
                                <td style="text-align: center; width: 15%">{{$requestData->date}}</td>
                                <td style="text-align: center; width: 15%">{{$requestData->name}}</td>
                                <td style="text-align: center; width: 15%">{{$requestData->address}}</td>
                                @if (strlen($requestData->comment) < 30)
                                    <td style="text-align: center; width: 15%">{{$requestData->comment}}</td>
                                @else
                                    <td style="text-align: center; width: 15%">
                                        <p>
                                            @csrf
                                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseComment" aria-expanded="false" aria-controls="collapseComment"> 
                                                <i class="fa fa-comment mr-1" aria-hidden="true"> Desplegar</i>
                                            </button>
                                        </p>
                                        <div class="collapse" id="collapseComment">
                                            <div class="card card-body">
                                                <div class="panel-heading text-justify">
                                                    {{$requestData->comment}}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        @php $numero = 0 @endphp

                    </tbody>
                </table>
            </div>

        </section>

    </div>

</body>
