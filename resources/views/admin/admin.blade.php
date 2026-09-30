<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Panel Administrativo</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <nav class="bg-green-700 border-gray-200">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">

            <a href="/admin" class="flex items-center">
                <span class="text-2xl font-semibold text-white">
                    Huella Ecológica
                </span>
            </a>

            <button data-collapse-toggle="navbar-admin"
                type="button"
                class="inline-flex items-center p-2 text-sm text-white rounded-lg md:hidden">
                <span class="sr-only">Abrir menú</span>
                ☰
            </button>

            <div class="hidden w-full md:block md:w-auto" id="navbar-admin">

                <ul class="flex flex-col md:flex-row md:space-x-8">

                    <li>
                        <a href="/admin"
                            class="block py-2 px-3 text-white hover:bg-green-800 rounded">
                            Inicio
                        </a>
                    </li>

                    <li>
                        <a href="/admin/usuarios/formulario"
                            class="block py-2 px-3 text-white hover:bg-green-800 rounded">
                            Usuario
                        </a>
                    </li>

                    <li>
                        <a href="/admin/usuarios/listado"
                            class="block py-2 px-3 text-white hover:bg-green-800 rounded">
                            Usuarios
                        </a>
                    </li>
                    <li>
                        <a href="/admin/categorias/formulario"
                        class="block py-2 px-3 text-white hover:bg-green-800 rounded">
                        Categoría
                    </a>
                </li>
                <li>
                    <a href="/admin/categorias/listado"
                    class="block py-2 px-3 text-white hover:bg-green-800 rounded">
                    Categorías
                </a>
            </li>     
                    <li>
                        <a href="/admin/actividades/formulario"
                            class="block py-2 px-3 text-white hover:bg-green-800 rounded">
                            Actividad
                        </a>
                    </li>

                    <li>
                        <a href="/admin/actividades/listado"
                            class="block py-2 px-3 text-white hover:bg-green-800 rounded">
                            Actividades
                        </a>
                    </li>

                    <li>
                        <a href="/admin/registros-huella/formulario"
                            class="block py-2 px-3 text-white hover:bg-green-800 rounded">
                            Registrar huella
                        </a>
                    </li>

                    <li>
                        <a href="/admin/registros-huella/listado"
                            class="block py-2 px-3 text-white hover:bg-green-800 rounded">
                            Registros
                        </a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>

    <main class="max-w-screen-xl mx-auto p-6">

        @yield('contenido')

    </main>

</body>

</html>