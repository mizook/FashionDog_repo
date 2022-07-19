<head>
    <title>FashionDog - Panel de Cliente</title>
    <link rel="icon" type="image/x-icon" href="../../../assets/FashionDogLogo.ico" />
    <script src="../js/scripts.js"></script>
</head>

<body>
    @include('layouts/navbar')


    <div class="content">
        <section class="p-3">
            <h1>INGRESAR COMENTARIO</h1>

            <div class="container">
                  <form
                    action="/cliente/commentService/{{$reqId}}"
                    method="POST" class="d-inline-block">
                    @csrf
                    <textarea id="newComment" name="newComment" rows="4" cols="50">{{$serviceComment}}</textarea>
                    <input type="text" id="reqId" name="reqId" value="{{$reqId}}" hidden>
                    <br>
                    <button type="submit" class="btn btn-warning" style="background-color: #FFD872">
                        <i class="fa fa-pencil" aria-hidden="true"></i> Comentar
                    </button>
                </form>
            </div>

        </section>

    </div>
</body>
