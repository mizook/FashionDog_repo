@extends('layouts.app')

@section('content')
<body>

    <h1>Client Dashboard Plantilla</h1>
    <div>Client RUT: {{ Auth::user()->rut }}</div>
    <div>Client Name: {{ Auth::user()->name }}</div>
    <div>Client Last Name: {{ Auth::user()->last_name }}</div>

</body>
</html>
@endsection
