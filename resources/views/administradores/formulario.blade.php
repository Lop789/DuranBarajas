@extends('admin.admin')

@section('contenido')

<div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow">

    <h1 class="text-2xl font-bold text-gray-900 mb-6">
        Registrar administrador
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

    <form action="/admin/administradores/guardar" method="POST">

        @csrf

        <div class="grid gap-6 mb-6 md:grid-cols-2">

            <input type="text" name="nombre" placeholder="Nombre"
                class="bg-gray-50 border border-gray-300 rounded-lg p-2.5">

            <input type="text" name="apellido" placeholder="Apellido"
                class="bg-gray-50 border border-gray-300 rounded-lg p-2.5">

            <input type="text" name="usuario" placeholder="Usuario"
                class="bg-gray-50 border border-gray-300 rounded-lg p-2.5">

            <select name="rol"
                class="bg-gray-50 border border-gray-300 rounded-lg p-2.5">

                <option value="superadmin">Superadmin</option>
                <option value="administrador">Administrador</option>
                <option value="capturista">Capturista</option>

            </select>

            <input type="email" name="correo" placeholder="Correo"
                class="bg-gray-50 border border-gray-300 rounded-lg p-2.5">

            <input type="text" name="telefono" placeholder="Teléfono"
                class="bg-gray-50 border border-gray-300 rounded-lg p-2.5">

            <input type="password" name="contrasena" placeholder="Contraseña"
                class="bg-gray-50 border border-gray-300 rounded-lg p-2.5">

            <input type="text" name="imagen" placeholder="Imagen"
                class="bg-gray-50 border border-gray-300 rounded-lg p-2.5">

        </div>

        <div class="mb-6">

            <input type="text" name="direccion" placeholder="Dirección"
                class="bg-gray-50 border border-gray-300 rounded-lg p-2.5 w-full">

        </div>

        <button type="submit"
            class="text-white bg-green-700 hover:bg-green-800 font-medium rounded-lg text-sm px-5 py-2.5">
            Guardar administrador
        </button>

    </form>

</div>

@endsection