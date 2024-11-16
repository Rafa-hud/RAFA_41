<!-- resources/views/admin/index.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
</head>
<body>
    <h1>Bienvenido al Panel de Administración</h1>
    <p>Solo los usuarios con rol de administrador pueden ver esta página.</p>

    <a href="{{ route('home') }}">Volver al Inicio</a>
</body>
</html>
