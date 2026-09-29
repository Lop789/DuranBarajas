@extends('admin.admin')

@section('contenido')

<div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow">

    <h1 class="text-2xl font-bold text-gray-900 mb-6">
        Editar usuario
    </h1>

    @if ($errors->any())
        <div class="mb-6 p-4 text-red-800 rounded-lg bg-red-100">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/admin/usuarios/actualizar/{{ $usuario->id }}" method="POST">

        @csrf
        @method('PUT')

        <div class="grid gap-6 mb-6 md:grid-cols-2">

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">
                    Nombre
                </label>

                <input
                    type="text"
                    name="nombre"
                    value="{{ $usuario->nombre }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                >
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">
                    Apellido
                </label>

                <input
                    type="text"
                    name="apellido"
                    value="{{ $usuario->apellido }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                >
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">
                    Correo
                </label>

                <input
                    type="email"
                    name="correo"
                    value="{{ $usuario->correo }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                >
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">
                    Teléfono
                </label>

                <input
                    type="text"
                    name="telefono"
                    value="{{ $usuario->telefono }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                >
            </div>

        </div>

        <div class="mb-6">
            <label class="block mb-2 text-sm font-medium text-gray-900">
                Dirección
            </label>

            <input
                type="text"
                name="direccion"
                value="{{ $usuario->direccion }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
            >
        </div>

        <div class="mb-6">
            <label class="block mb-2 text-sm font-medium text-gray-900">
                Nueva contraseña
            </label>

            <input
                type="password"
                name="contrasena"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                placeholder="Dejar vacío para conservar la actual"
            >
        </div>

        <div class="mb-6">

            <label class="block mb-2 text-sm font-medium text-gray-900">
                Estado
            </label>

            <select
                name="estado"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
            >
                <option value="1" {{ $usuario->estado ? 'selected' : '' }}>
                    Activo
                </option>

                <option value="0" {{ !$usuario->estado ? 'selected' : '' }}>
                    Inactivo
                </option>
            </select>

        </div>

        <div class="flex gap-3">

            <button
                type="submit"
                class="text-white bg-green-700 hover:bg-green-800 font-medium rounded-lg text-sm px-5 py-2.5"
            >
                Actualizar usuario
            </button>

            <a
                href="/admin/usuarios/listado"
                class="text-gray-900 bg-gray-200 hover:bg-gray-300 font-medium rounded-lg text-sm px-5 py-2.5"
            >
                Cancelar
            </a>

        </div>

    </form>

</div>

@endsection