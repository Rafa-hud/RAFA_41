<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- layouts/app.blade.php -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Aplicación Laravel</title>
    <!-- Puedes agregar aquí tus enlaces a hojas de estilo o scripts -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">Bienvenido a WORL PLANTS</h1>

        <!-- Contenedor de botones -->
        <div class="d-flex justify-content-center gap-3 flex-wrap mb-4">
            <a href="{{ route('home') }}" class="btn btn-secondary btn-lg">Inicio</a>   
            <a href="{{ route('herramientas.create') }}" class="btn btn-primary btn-lg">Crear Nueva Herramienta</a>
            <a href="{{ route('productos.create') }}" class="btn btn-success btn-lg">Crear Nuevo Producto</a>
            <a href="{{ route('metodos_de_pago.create') }}" class="btn btn-warning btn-lg">Crear Nuevo Método de Pago</a>
        </div>

        <!-- Sección de contenido -->
        <div class="content-section">
            @yield('content')
        </div>
    </div>

    <!-- Agregar el script de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Puedes agregar tus scripts aquí -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
