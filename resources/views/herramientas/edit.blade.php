@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h1>Editar Herramienta</h1>

        <!-- Formulario de edición -->
        <form action="{{ route('herramientas.update', $herramienta->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Nombre -->
            <div class="form-group mb-3">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $herramienta->nombre) }}" required>
                @error('nombre')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Descripción -->
            <div class="form-group mb-3">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control @error('descripcion') is-invalid @enderror">{{ old('descripcion', $herramienta->descripcion) }}</textarea>
                @error('descripcion')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Cantidad -->
            <div class="form-group mb-3">
                <label for="cantidad">Cantidad</label>
                <input type="number" name="cantidad" id="cantidad" class="form-control @error('cantidad') is-invalid @enderror" value="{{ old('cantidad', $herramienta->cantidad) }}" required>
                @error('cantidad')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Disponible -->
            <div class="form-group mb-3">
                <label for="disponible">Disponible</label>
                <input type="checkbox" name="disponible" id="disponible" {{ old('disponible', $herramienta->disponible) ? 'checked' : '' }}>
            </div>

            <!-- Botón de actualización -->
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection
