<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Huella Ecológica</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-green-700 border-gray-200">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">

            <a href="/ecologia" class="flex items-center space-x-3">
                <span class="self-center text-2xl font-semibold text-white">
                    Huella Ecológica
                </span>
            </a>

            <div class="hidden w-full md:block md:w-auto">
                <ul class="flex flex-col md:flex-row md:space-x-8">

                    <li>
                        <a href="/"
                            class="block py-2 px-3 text-white rounded hover:bg-green-800">
                            Inicio
                        </a>
                    </li>

                    <li>
                        <a href="/ecologia"
                            class="block py-2 px-3 text-white rounded hover:bg-green-800">
                            Mi huella
                        </a>
                    </li>

                    <li>
                        <a href="/admin/registros-huella/formulario"
                            class="block py-2 px-3 text-white rounded hover:bg-green-800">
                            Administración
                        </a>
                    </li>

                </ul>
            </div>

        </div>
    </nav>


    <!-- Contenido principal -->
    <main class="max-w-screen-xl mx-auto p-6">

        <!-- Presentación -->
        <section class="bg-white border border-gray-200 rounded-lg shadow-sm p-8 md:p-12 mb-8">

            <div class="grid md:grid-cols-2 gap-8 items-center">

                <div>

                    <span class="text-green-700 font-semibold uppercase">
                        Cuidemos el planeta
                    </span>

                    <h1 class="mt-3 mb-4 text-4xl font-extrabold tracking-tight text-gray-900">
                        Calcula tu huella ecológica
                    </h1>

                    <p class="mb-6 text-lg text-gray-600">
                        Conoce el impacto ambiental de tus actividades diarias
                        y descubre formas sencillas de reducir tu huella ecológica.
                    </p>

                    <a href="/admin/registros-huella/formulario"
                        class="inline-flex items-center px-5 py-3 text-sm font-medium
                        text-white bg-green-700 rounded-lg
                        hover:bg-green-800 focus:ring-4 focus:ring-green-300">

                        Comenzar cálculo

                        <svg class="w-4 h-4 ml-2"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 14 10">

                            <path stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />

                        </svg>

                    </a>

                </div>


                <!-- Tarjeta lateral -->
                <div class="bg-green-100 rounded-lg p-10 text-center">

                    <div class="text-7xl mb-4">
                        🌱
                    </div>

                    <h2 class="text-2xl font-bold text-green-800">
                        Tu planeta cuenta contigo
                    </h2>

                    <p class="mt-3 text-green-700">
                        Cada pequeña acción puede generar un cambio positivo.
                    </p>

                </div>

            </div>

        </section>


        <!-- Categorías -->
        <section>

            <h2 class="mb-6 text-3xl font-bold text-gray-900">
                Conoce tu impacto
            </h2>


            <div class="grid md:grid-cols-3 gap-6">


                <!-- Transporte -->
                <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-6">

                    <div class="flex items-center justify-center w-12 h-12 mb-4
                        bg-green-100 rounded-lg">

                        <span class="text-2xl">
                            🚗
                        </span>

                    </div>

                    <h3 class="mb-2 text-xl font-bold text-gray-900">
                        Transporte
                    </h3>

                    <p class="text-gray-600">
                        Registra tus medios de transporte y conoce
                        el impacto que generan.
                    </p>

                </div>


                <!-- Energía -->
                <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-6">

                    <div class="flex items-center justify-center w-12 h-12 mb-4
                        bg-yellow-100 rounded-lg">

                        <span class="text-2xl">
                            ⚡
                        </span>

                    </div>

                    <h3 class="mb-2 text-xl font-bold text-gray-900">
                        Energía
                    </h3>

                    <p class="text-gray-600">
                        Analiza tu consumo energético y descubre
                        oportunidades para reducirlo.
                    </p>

                </div>


                <!-- Alimentación -->
                <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-6">

                    <div class="flex items-center justify-center w-12 h-12 mb-4
                        bg-orange-100 rounded-lg">

                        <span class="text-2xl">
                            🍎
                        </span>

                    </div>

                    <h3 class="mb-2 text-xl font-bold text-gray-900">
                        Alimentación
                    </h3>

                    <p class="text-gray-600">
                        Conoce cómo tus hábitos alimenticios influyen
                        en tu huella ecológica.
                    </p>

                </div>

            </div>

        </section>

    </main>


    <!-- Footer -->
    <footer class="bg-green-700 mt-10">

        <div class="max-w-screen-xl mx-auto p-6 text-center">

            <p class="text-white">
                Huella Ecológica © 2026
            </p>

            <p class="text-green-100 text-sm mt-2">
                Proyecto de Desarrollo de Software Multiplataforma
            </p>

        </div>

    </footer>

</body>

</html>