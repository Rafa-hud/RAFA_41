@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Agrega Bootstrap CSS si no lo tienes ya -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Crear Producto</title>
</head>
<body>
    <div class="container my-5">
        <div class="card shadow-lg p-4">
            <h1>Crear Producto</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="user-form" action="{{ route('productos.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea name="descripcion" class="form-control">{{ old('descripcion') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="precio">Precio:</label>
                    <input type="number" name="precio" class="form-control" value="{{ old('precio') }}">
                </div>
               <br> 
                <button type="submit" class="btn btn-success">Crear Producto</button> 
            </form>
        </div>
    </div>
</body>
</html>

<!-- Incluir jQuery, SweetAlert2 y Bootstrap desde CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Script personalizado para manejar el formulario -->
<script>
    $(document).ready(function() {
        $('#user-form').on('submit', function(event) {
            event.preventDefault(); // Evitar el envío tradicional del formulario

            // Validar el campo de nombre
            if ($('#nombre').val() === '') {
                Swal.fire("¡Error!", "Por favor, ingresa un nombre.", "error"); // Uso de SweetAlert2
                return; // Detener la ejecución si el nombre está vacío
            }

            // Recopilar datos del formulario
            var formData = $(this).serialize();

            // Enviar datos usando AJAX
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'), // Usar la acción del formulario
                data: formData,
                success: function(response) {
                    // Manejar la respuesta del servidor
                    Swal.fire("¡Éxito!", "producto creado exitosamente.", "success").then(() => {
                        // Opcional: Reiniciar el formulario o redirigir a otra página
                        $('#user-form')[0].reset();
                        // Redirigir si es necesario
                        // window.location.href = '/ruta/deseada'; 
                    });
                },
                error: function(xhr) {
                    // Manejar errores
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        Swal.fire("¡Error!", value[0], "error"); // Mostrar el primer error
                    });
                }
            });
        });
    });
</script>

@endsection
