@extends('admin.admin')

@section('contenido')

<div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow">

    <h1 class="text-2xl font-bold text-gray-900 mb-6">
        Registrar usuario
    </h1>

    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-100 text-red-700 rounded-lg">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/admin/usuarios/guardar" method="POST">

        @csrf

        <div class="grid gap-6 mb-6 md:grid-cols-2">

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">
                    Nombre
                </label>

                <input type="text"
                    name="nombre"
                    value="{{ old('nombre') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                    rounded-lg focus:ring-green-500 focus:border-green-500
                    block w-full p-2.5"
                    placeholder="Nombre"
                    required>
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">
                    Apellido
                </label>

                <input type="text"
                    name="apellido"
                    value="{{ old('apellido') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                    rounded-lg focus:ring-green-500 focus:border-green-500
                    block w-full p-2.5"
                    placeholder="Apellido"
                    required>
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">
                    Correo
                </label>

                <input type="email"
                    name="correo"
                    value="{{ old('correo') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                    rounded-lg focus:ring-green-500 focus:border-green-500
                    block w-full p-2.5"
                    placeholder="correo@ejemplo.com"
                    required>
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">
                    Teléfono
                </label>

                <input type="tel"
                    name="telefono"
                    value="{{ old('telefono') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                    rounded-lg focus:ring-green-500 focus:border-green-500
                    block w-full p-2.5"
                    placeholder="Teléfono">
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">
                    Contraseña
                </label>

                <input type="password"
                    name="contrasena"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                    rounded-lg focus:ring-green-500 focus:border-green-500
                    block w-full p-2.5"
                    required>
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">
                    Estado
                </label>

                <select
                    name="estado"
                    class="bg-gray-50 border border-gray-300 text-gray-900
                    text-sm rounded-lg focus:ring-green-500 focus:border-green-500
                    block w-full p-2.5">

                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>

                </select>
            </div>

        </div>

        <button type="submit"
            class="text-white bg-green-700 hover:bg-green-800
            focus:ring-4 focus:ring-green-300 font-medium rounded-lg
            text-sm px-5 py-2.5">

            Guardar usuario

        </button>

    </form>

</div>

@endsection