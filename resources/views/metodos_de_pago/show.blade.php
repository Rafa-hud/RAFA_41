@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalles del Método de Pago</title>
</head>
<body>
    <h1>Detalles del Método de Pago</h1>

    <div>
        <strong>ID:</strong> {{ $metodoDePago->id }}
    </div>
    <div>
        <strong>Nombre:</strong> {{ $metodoDePago->nombre }}
    </div>
    <div>
        <strong>Descripción:</strong> {{ $metodoDePago->descripcion }}
    </div>
    <div>
        <strong>Tipo:</strong> {{ $metodoDePago->tipo }}
    </div>
    <div>
        <strong>Activo:</strong> {{ $metodoDePago->activo ? 'Sí' : 'No' }}
    </div>
    <div>
        <strong>Comisión:</strong> {{ $metodoDePago->comision ? $metodoDePago->comision . '%' : 'N/A' }}
    </div>

    <a href="{{ route('metodos_de_pago.index') }}" class="btn btn-primary">Volver a la lista</a>
</body>
</html>

@endsection
