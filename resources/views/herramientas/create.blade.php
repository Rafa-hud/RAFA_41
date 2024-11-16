@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Herramienta</title>
    <!-- Agrega Bootstrap CSS si no lo tienes ya -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Incluir jQuery desde CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Incluir SweetAlert2 desde CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <div class="card shadow-lg p-4">
            <h2 class="text-center mb-4">Agregar Herramienta</h2>
            <form id="user-form" action="{{ route('herramientas.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción:</label>
                    <textarea name="descripcion" id="descripcion" class="form-control" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label for="cantidad" class="form-label">Cantidad:</label>
                    <input type="number" name="cantidad" id="cantidad" class="form-control" min="0" required>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" name="disponible" id="disponible" class="form-check-input" value="1" checked>
                    <label for="disponible" class="form-check-label">Disponible</label>
                </div>

                <button type="submit" class="btn btn-primary w-100">Guardar</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#user-form').on('submit', function(event) {
                event.preventDefault(); 

                if ($('#nombre').val() === '') {
                    Swal.fire("¡Error!", "Por favor, ingresa un nombre.", "error"); 
                    return;
                }

                var formData = $(this).serialize();

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'), 
                    data: formData,
                    success: function(response) {
                        Swal.fire("¡Éxito!", "Herramienta creada exitosamente.", "success").then(() => {
                            $('#user-form')[0].reset();
                        });
                    },
                    error: function(xhr) {
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            Swal.fire("¡Error!", value[0], "error"); 
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>
@endsection
