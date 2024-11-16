@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Método de Pago</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('metodos_de_pago.update', $metodo->id) }}" method="POST">
        @csrf
        @method('PUT')  <!-- Esto indica que la solicitud es una actualización -->
        
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $metodo->nombre) }}" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{ old('descripcion', $metodo->descripcion) }}</textarea>
        </div>

        <div class="form-group">
            <label for="tipo">Tipo</label>
            <select class="form-control" id="tipo" name="tipo" required>
                <option value="Digital" {{ old('tipo', $metodo->tipo) == 'Digital' ? 'selected' : '' }}>Digital</option>
                <option value="Efectivo" {{ old('tipo', $metodo->tipo) == 'Efectivo' ? 'selected' : '' }}>Efectivo</option>
                <option value="Tarjeta" {{ old('tipo', $metodo->tipo) == 'Tarjeta' ? 'selected' : '' }}>Tarjeta</option>
                <option value="Otro" {{ old('tipo', $metodo->tipo) == 'Otro' ? 'selected' : '' }}>Otro</option>
            </select>
        </div>

        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="activo" name="activo" {{ old('activo', $metodo->activo) ? 'checked' : '' }}>
            <label class="form-check-label" for="activo">Activo</label>
        </div>

        <div class="form-group">
            <label for="comision">Comisión (%)</label>
            <input type="number" class="form-control" id="comision" name="comision" step="0.01" min="0" value="{{ old('comision', $metodo->comision) }}">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('metodos_de_pago.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
