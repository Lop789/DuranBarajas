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
            Listado de actividades
        </h1>

        <a
            href="/admin/actividades/formulario"
            class="text-white bg-green-700 hover:bg-green-800 font-medium rounded-lg text-sm px-5 py-2.5"
        >
            Nueva actividad
        </a>

    </div>

    <div class="overflow-x-auto">

        <table class="w-full text-sm text-left text-gray-500">

            <thead class="text-xs text-gray-700 uppercase bg-gray-50">

                <tr>

                    <th class="px-6 py-3">ID</th>
                    <th class="px-6 py-3">Actividad</th>
                    <th class="px-6 py-3">Categoría</th>
                    <th class="px-6 py-3">Unidad</th>
                    <th class="px-6 py-3">Factor</th>
                    <th class="px-6 py-3">Estado</th>
                    <th class="px-6 py-3">Acciones</th>

                </tr>

            </thead>

            <tbody>

                @foreach ($actividades as $actividad)

                <tr class="bg-white border-b">

                    <td class="px-6 py-4">
                        {{ $actividad->id }}
                    </td>

                    <td class="px-6 py-4 font-medium text-gray-900">
                        {{ $actividad->nombre }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $actividad->categoria->nombre ?? 'Sin categoría' }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $actividad->unidad }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $actividad->factor_emision }}
                    </td>

                    <td class="px-6 py-4">

                        @if ($actividad->estado)

                            <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                Activo
                            </span>

                        @else

                            <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                Inactivo
                            </span>

                        @endif

                    </td>

                    <td class="px-6 py-4">

                        <div class="flex gap-3">

                            <a
                                href="/admin/actividades/editar/{{ $actividad->id }}"
                                class="font-medium text-blue-600 hover:underline"
                            >
                                Editar
                            </a>

                            <form
                                action="/admin/actividades/eliminar/{{ $actividad->id }}"
                                method="POST"
                                onsubmit="return confirm('¿Seguro que deseas eliminar esta actividad?');"
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