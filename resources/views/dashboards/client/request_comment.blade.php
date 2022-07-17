<head>
    <title>FashionDog - Panel de Cliente</title>
    <link rel="icon" type="image/x-icon" href="../../../assets/FashionDogLogo.ico" />
    <script src="/js/scripts.js"></script>
</head>

<body>
    @include('layouts.navbar')

    <div class="content">
        <section class="p-3">
            <h1>COMENTARIO</h1>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">

                        <div class="card text-center">
                            <div class="card-header" style="background-color: #ff828b">
                                <h5 style="color: white" class="pt-3">Comentario de la solicitud {{ $id }}</h1>
                            </div>
                            @if($request_comment != "")
                            <div class="card-body" >
                                <div class="form-group">
                                    <textarea class="form-control" id="comment" placeholder="{{ $request_comment }}" disabled></textarea>
                                </div>
                            </div>
                            <div style="width: 100%">
                                <button type="submit" class="btn btn-success btn-block stylist-table-buttonspb-5 mb-4" style="background-color: #4DD091; width:25%;" disabled>
                                    <i class="fa fa-comment" aria-hidden="true" style=""></i>
                                    <h4 class="stylist-table-text">Comentar</h6>
                                </button>
                            </div>
                            @else
                            <form action="{{ route('client.comment', ['id' => $id]) }}" method="POST" id="requestComment">
                            @csrf
                            <div class="card-body" >
                                <div class="form-group">
                                    <textarea class="form-control" id="new_comment" name="new_comment" maxlength="100"></textarea>
                                </div>
                            </div>
                            <div style="width: 100%">
                                <button type="submit" class="btn btn-success btn-block stylist-table-buttonspb-5 mb-4" style="background-color: #4DD091; width:25%;"
                                        onclick="ConfirmationPopUp('requestComment')">
                                    <i class="fa fa-comment" aria-hidden="true" style=""></i>
                                    <h4 class="stylist-table-text">Comentar</h6>
                                </button>
                            </div>
                            </form>
                            @endif
                        </div>

                    </div>
                </div>
            </div>




        </section>

    </div>

</body>

</html>
