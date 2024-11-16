<!-- resources/views/home.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <!-- Agregar el enlace a Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <!-- Título -->
        <h1 class="text-center mb-4">Bienvenido a la página de inicio</h1>

        <!-- Formulario de Cierre de sesión -->
        <div class="d-flex justify-content-center">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Cerrar sesión</button>
            </form>
        </div>

        <!-- Panel de administración (solo visible para el admin) -->
        @if(Auth::user()->role == 'admin')
            <div class="text-center my-4">
                <a href="{{ route('admin.index') }}" class="btn btn-primary">Ir al Panel de Administración</a>
            </div>
        @endif

        <!-- Acciones para crear herramientas, productos y métodos de pago -->
        @if(Auth::user()->role == 'admin' || Auth::user()->role == 'user')
            <div class="d-flex justify-content-center gap-3 flex-wrap my-4">
                <a href="{{ route('herramientas.create') }}" class="btn btn-success btn-lg">Herramientas</a>
                <a href="{{ route('productos.create') }}" class="btn btn-warning btn-lg">Productos</a>
                <a href="{{ route('metodos_de_pago.create') }}" class="btn btn-info btn-lg">Métodos de Pago</a>
            </div>
        @endif
    </div>

    <!-- Agregar el script de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
