<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Aplicación</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- Aquí puedes agregar tus estilos CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Mi Aplicación</a>
        <!-- Aquí puedes agregar más elementos de la barra de navegación -->
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Aquí puedes agregar tus scripts JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
