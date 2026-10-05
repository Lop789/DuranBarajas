<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Huella Ecológica</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f5f7;
            color: #222;
        }

        /* BARRA DE NAVEGACIÓN */
        .navbar {
            background: #00852b;
            color: white;
            padding: 18px 0;
        }

        .navbar-contenido {
            width: 90%;
            max-width: 1200px;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .titulo {
            font-size: 25px;
            font-weight: bold;
        }

        .menu {
            display: flex;
            gap: 28px;
        }

        .menu a {
            color: white;
            text-decoration: none;
            font-size: 16px;
        }

        .menu a:hover {
            text-decoration: underline;
        }

        /* CONTENIDO */
        .contenido {
            width: 90%;
            max-width: 1200px;
            margin: 35px auto;
        }

        h1 {
            font-size: 30px;
            margin-bottom: 20px;
        }

        h2 {
            font-size: 26px;
            margin-bottom: 20px;
        }

        /* BOTÓN NUEVO */
        h1 + a,
        h2 + a {
            display: inline-block;
            background: #00852b;
            color: white;
            text-decoration: none;
            padding: 9px 15px;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        h1 + a:hover,
        h2 + a:hover {
            background: #006d24;
        }

        /* TABLAS */
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            margin-top: 5px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.08);
        }

        th {
            background: #00852b;
            color: white;
            text-align: left;
            padding: 12px;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #e1e1e1;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover td {
            background: #fafafa;
        }

        /* BOTONES DE ACCIONES */
        td a {
            display: inline-block;
            padding: 6px 11px;
            margin-right: 5px;
            border-radius: 4px;
            text-decoration: none;
            color: white;
            background: #2563eb;
            font-size: 14px;
        }

        td a:hover {
            background: #1d4ed8;
        }

        /* Boton de eliminar */
        td form {
            display: inline;
            background: transparent;
            padding: 0;
            margin: 0;
            box-shadow: none;
            border: none;
        }

        td form button {
            background: #dc2626;
            color: white;
            border: none;
            padding: 6px 11px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        td form button:hover {
            background: #b91c1c;
        }

        /* FORMULARIOS */
        form {
            background: white;
            padding: 25px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.08);
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            min-height: 100px;
        }

        form button {
            background: #00852b;
            color: white;
            border: none;
            padding: 10px 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        form button:hover {
            background: #006d24;
        }

        /* MENSAJES */
        .mensaje {
            background: #d1fae5;
            color: #065f46;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        /* PANTALLAS PEQUEÑAS */
        @media (max-width: 900px) {

            .navbar-contenido {
                flex-direction: column;
                gap: 15px;
            }

            .menu {
                flex-wrap: wrap;
                justify-content: center;
                gap: 15px;
            }

            .contenido {
                overflow-x: auto;
            }

            table {
                min-width: 750px;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">

        <div class="navbar-contenido">

            <div class="titulo">
                Huella Ecológica
            </div>

            <div class="menu">

                <a href="/admin">Inicio</a>

                <a href="/admin/usuarios/listar">
                    Usuarios
                </a>

                <a href="/admin/categorias/listar">
                    Categorías
                </a>

                <a href="/admin/actividades/listar">
                    Actividades
                </a>

                <a href="/admin/registros-huella/listar">
                    Registros de huella
                </a>

                <a href="/admin/administradores/listar">
                    Administradores
                </a>

            </div>

        </div>

    </nav>


    <main class="contenido">

        @yield('contenido')

    </main>

</body>
</html>