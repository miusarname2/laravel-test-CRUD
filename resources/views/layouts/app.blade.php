<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <meta name="author" content="Oscar M Alvarez G">
    <meta name="description" content="">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    @yield('extraStyles')
</head>
<body class="bg-gray-100 font-family-karla flex">
    @yield('asides')
    @yield('content')
    @yield('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
