<!-- resources/views/herramientas/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h1 class="text-center mb-4">Lista de Herramientas</h1>

        <!-- Mensaje de éxito -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Botón para añadir nueva herramienta -->
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('herramientas.create') }}" class="btn btn-primary">Añadir Nueva Herramienta</a>
        </div>

        <!-- Tabla de herramientas -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Cantidad</th>
                        <th>Disponible</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($herramientas as $herramienta)
                        <tr>
                            <td>{{ $herramienta->id }}</td>
                            <td>{{ $herramienta->nombre }}</td>
                            <td>{{ $herramienta->descripcion }}</td>
                            <td>{{ $herramienta->cantidad }}</td>
                            <td>
                                <span class="badge {{ $herramienta->disponible ? 'bg-success' : 'bg-danger' }}">
                                    {{ $herramienta->disponible ? 'Sí' : 'No' }}
                                </span>
                            </td>
                            <td>
                                <!-- Botón para editar -->
                                <a href="{{ route('herramientas.edit', $herramienta->id) }}" class="btn btn-warning btn-sm me-2">Editar</a>

                                <!-- Formulario para eliminar -->
                                <form action="{{ route('herramientas.destroy', $herramienta->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar esta herramienta?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No hay herramientas registradas</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        <div class="d-flex justify-content-center mt-4">
            {{ $herramientas->links() }}
        </div>
    </div>
@endsection
