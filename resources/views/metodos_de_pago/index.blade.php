@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Métodos de Pago</h1>
    <a href="{{ route('metodos_de_pago.create') }}" class="btn btn-primary">Crear Método de Pago</a>
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Tipo</th>
                <th>Activo</th>
                <th>Comisión (%)</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($metodos as $metodo)
            <tr>
                <td>{{ $metodo->id }}</td>
                <td>{{ $metodo->nombre }}</td>
                <td>{{ $metodo->descripcion }}</td>
                <td>{{ $metodo->tipo }}</td>
                <td>{{ $metodo->activo ? 'Sí' : 'No' }}</td>
                <td>{{ $metodo->comision }}%</td>
                <td>
                    <a href="{{ route('metodos_de_pago.show', $metodo) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('metodos_de_pago.edit', $metodo) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('metodos_de_pago.destroy', $metodo) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este método de pago?');">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
