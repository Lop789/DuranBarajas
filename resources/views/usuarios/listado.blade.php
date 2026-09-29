@extends('admin.admin')

@section('contenido')

@if(session('success'))
    <div class="mb-6 p-4 text-green-800 bg-green-100 rounded-lg">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="mb-6 p-4 text-red-800 bg-red-100 rounded-lg">
        {{ session('error') }}
    </div>
@endif

<div class="bg-white relative shadow-md rounded-lg overflow-hidden">

    <div class="p-5 flex items-center justify-between">

        <h1 class="text-2xl font-bold text-gray-900">
            Listado de usuarios
        </h1>

        <a href="/admin/usuarios/formulario"
            class="text-white bg-green-700 hover:bg-green-800
            font-medium rounded-lg text-sm px-5 py-2.5">
            Nuevo usuario
        </a>

    </div>

    <div class="overflow-x-auto">

        <table class="w-full text-sm text-left text-gray-500">

            <thead class="text-xs text-gray-700 uppercase bg-gray-50">

                <tr>

                    <th class="px-6 py-3">ID</th>
                    <th class="px-6 py-3">Nombre</th>
                    <th class="px-6 py-3">Apellido</th>
                    <th class="px-6 py-3">Correo</th>
                    <th class="px-6 py-3">Teléfono</th>
                    <th class="px-6 py-3">Estado</th>
                    <th class="px-6 py-3">Acciones</th>

                </tr>

            </thead>

            <tbody>

                @foreach ($usuarios as $usuario)

                <tr class="bg-white border-b">

                    <td class="px-6 py-4">
                        {{ $usuario->id }}
                    </td>

                    <td class="px-6 py-4 font-medium text-gray-900">
                        {{ $usuario->nombre }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $usuario->apellido }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $usuario->correo }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $usuario->telefono }}
                    </td>

                    <td class="px-6 py-4">

                        @if ($usuario->estado)

                            <span class="bg-green-100 text-green-800 text-xs
                                font-medium px-2.5 py-0.5 rounded">
                                Activo
                            </span>

                        @else

                            <span class="bg-red-100 text-red-800 text-xs
                                font-medium px-2.5 py-0.5 rounded">
                                Inactivo
                            </span>

                        @endif

                    </td>

                    <td class="px-6 py-4">

                        <div class="flex gap-3">

                            <a
                                href="/admin/usuarios/editar/{{ $usuario->id }}"
                                class="font-medium text-blue-600 hover:underline"
                            >
                                Editar
                            </a>

                            <form
                                action="/admin/usuarios/eliminar/{{ $usuario->id }}"
                                method="POST"
                                onsubmit="return confirm('¿Seguro que deseas eliminar este usuario?');"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="font-medium text-red-600 hover:underline"
                                >
                                    Eliminar
                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection