@extends('admin.admin')

@section('contenido')

@if(session('success'))
    <div class="mb-6 p-4 text-green-800 bg-green-100 rounded-lg">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white shadow-md rounded-lg overflow-hidden">

    <div class="p-5 flex items-center justify-between">

        <h1 class="text-2xl font-bold text-gray-900">
            Listado de administradores
        </h1>

        <a href="/admin/administradores/crear"
            class="text-white bg-green-700 hover:bg-green-800
            font-medium rounded-lg text-sm px-5 py-2.5">
            Nuevo administrador
        </a>

    </div>

    <div class="overflow-x-auto">

        <table class="w-full text-sm text-left text-gray-500">

            <thead class="text-xs text-gray-700 uppercase bg-gray-50">

                <tr>
                    <th class="px-6 py-3">ID</th>
                    <th class="px-6 py-3">Imagen</th>
                    <th class="px-6 py-3">Nombre</th>
                    <th class="px-6 py-3">Usuario</th>
                    <th class="px-6 py-3">Rol</th>
                    <th class="px-6 py-3">Correo</th>
                    <th class="px-6 py-3">Estado</th>
                    <th class="px-6 py-3">Acciones</th>
                </tr>

            </thead>

            <tbody>

                @foreach ($administradores as $administrador)

                <tr class="bg-white border-b">

                    <td class="px-6 py-4">
                        {{ $administrador->id }}
                    </td>

                    <td class="px-6 py-4">
                        <img
                            src="{{ asset('images/administrador_' . $administrador->id . '.png') }}"
                            alt="Administrador {{ $administrador->id }}"
                            class="w-10 h-10 object-contain"
                        >
                    </td>

                    <td class="px-6 py-4 font-medium text-gray-900">
                        {{ $administrador->nombre }}
                        {{ $administrador->apellido }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $administrador->usuario }}
                    </td>

                    <td class="px-6 py-4">
                        {{ ucfirst($administrador->rol) }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $administrador->correo }}
                    </td>

                    <td class="px-6 py-4">

                        @if($administrador->estado)

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
                                href="/admin/administradores/editar/{{ $administrador->id }}"
                                class="text-white bg-blue-600 hover:bg-blue-700
                                font-medium rounded-lg text-sm px-4 py-2">
                                Editar
                            </a>

                            <form
                                action="/admin/administradores/borrar/{{ $administrador->id }}"
                                method="POST"
                                onsubmit="return confirm('¿Seguro que deseas eliminar este administrador?');"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="text-white bg-red-600 hover:bg-red-700
                                    font-medium rounded-lg text-sm px-4 py-2">
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