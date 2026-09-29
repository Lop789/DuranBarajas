@extends('admin.admin')

@section('contenido')

<div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow">

    <h1 class="text-2xl font-bold text-gray-900 mb-6">
        Editar administrador
    </h1>

    @if ($errors->any())
        <div class="mb-6 p-4 text-red-800 bg-red-100 rounded-lg">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        action="/admin/administradores/actualizar/{{ $administrador->id }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        <div class="grid gap-6 mb-6 md:grid-cols-2">

            <input type="text" name="nombre"
                value="{{ $administrador->nombre }}"
                placeholder="Nombre"
                class="bg-gray-50 border border-gray-300 rounded-lg p-2.5">

            <input type="text" name="apellido"
                value="{{ $administrador->apellido }}"
                placeholder="Apellido"
                class="bg-gray-50 border border-gray-300 rounded-lg p-2.5">

            <input type="text" name="usuario"
                value="{{ $administrador->usuario }}"
                placeholder="Usuario"
                class="bg-gray-50 border border-gray-300 rounded-lg p-2.5">

            <select name="rol"
                class="bg-gray-50 border border-gray-300 rounded-lg p-2.5">

                <option value="superadmin"
                    {{ $administrador->rol === 'superadmin' ? 'selected' : '' }}>
                    Superadmin
                </option>

                <option value="administrador"
                    {{ $administrador->rol === 'administrador' ? 'selected' : '' }}>
                    Administrador
                </option>

                <option value="capturista"
                    {{ $administrador->rol === 'capturista' ? 'selected' : '' }}>
                    Capturista
                </option>

            </select>

            <input type="email" name="correo"
                value="{{ $administrador->correo }}"
                placeholder="Correo"
                class="bg-gray-50 border border-gray-300 rounded-lg p-2.5">

            <input type="text" name="telefono"
                value="{{ $administrador->telefono }}"
                placeholder="Teléfono"
                class="bg-gray-50 border border-gray-300 rounded-lg p-2.5">

            <input type="password" name="contrasena"
                placeholder="Nueva contraseña (opcional)"
                class="bg-gray-50 border border-gray-300 rounded-lg p-2.5">

            <input type="text" name="imagen"
                value="{{ $administrador->imagen }}"
                placeholder="Imagen"
                class="bg-gray-50 border border-gray-300 rounded-lg p-2.5">

        </div>

        <div class="mb-6">

            <input type="text" name="direccion"
                value="{{ $administrador->direccion }}"
                placeholder="Dirección"
                class="bg-gray-50 border border-gray-300 rounded-lg p-2.5 w-full">

        </div>

        <div class="mb-6">

            <select name="estado"
                class="bg-gray-50 border border-gray-300 rounded-lg p-2.5 w-full">

                <option value="1" {{ $administrador->estado ? 'selected' : '' }}>
                    Activo
                </option>

                <option value="0" {{ !$administrador->estado ? 'selected' : '' }}>
                    Inactivo
                </option>

            </select>

        </div>

        <button type="submit"
            class="text-white bg-green-700 hover:bg-green-800 font-medium rounded-lg text-sm px-5 py-2.5">
            Actualizar administrador
        </button>

    </form>

</div>

@endsection