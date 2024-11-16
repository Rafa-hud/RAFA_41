@extends('layouts.app')

@section('content')

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <h1>Detalles del Producto</h1>

    <div>
        <strong>ID:</strong> {{ $producto->id }}
    </div>
    <div>
        <strong>Nombre:</strong> {{ $producto->nombre }}
    </div>
    <div>
        <strong>Descripción:</strong> {{ $producto->descripcion }}
    </div>
    <div>
        <strong>Precio:</strong> {{ $producto->precio }}
    </div>

    <a href="{{ route('productos.index') }}" class="btn btn-primary">Volver a la lista</a>
</body>
</html>
    
@endsection
