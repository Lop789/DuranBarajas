<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('titulo')</title>
</head>

<body>

    <nav>
        <a href="/">Inicio</a>
        <a href="/servicios">Servicios</a>
        <a href="/reservaciones">Reservaciones</a>
        <a href="/nosotros">Nosotros</a>
        <a href="/contacto">Contacto</a>
    </nav>

    <hr>

    @yield('contenido')

</body>
</html>