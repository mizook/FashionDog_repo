@extends('layouts.app')

@section('content')
<body>

    <h1>Admin Dashboard Plantilla</h1>
    <div>Admin RUT: {{ Auth::user()->rut }}</div>

</body>
</html>
@endsection
