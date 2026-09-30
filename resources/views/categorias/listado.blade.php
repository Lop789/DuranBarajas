@extends('admin.admin')

@section('contenido')

<div class="max-w-6xl mx-auto">

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-3xl font-bold text-gray-900">
            Categorías
        </h1>

        <a href="/admin/categorias/formulario"
            class="bg-green-700 text-white px-5 py-2 rounded-lg">
            + Nueva categoría
        </a>

    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 text-red-800 p-4 rounded-lg mb-4">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow overflow-hidden">

        <table class="w-full text-left">

            <thead class="bg-gray-100">
                <tr>
                    <th class="p-4">ID</th>
                    <th class="p-4">Nombre</th>
                    <th class="p-4">Descripción</th>
                    <th class="p-4">Estado</th>
                    <th class="p-4">Acciones</th>
                </tr>
            </thead>

            <tbody>

                @forelse($categorias as $categoria)

                <tr class="border-t">

                    <td class="p-4">
                        {{ $categoria->id }}
                    </td>

                    <td class="p-4 font-medium">
                        {{ $categoria->nombre }}
                    </td>

                    <td class="p-4">
                        {{ $categoria->descripcion }}
                    </td>

                    <td class="p-4">
                        @if($categoria->estado)
                            <span class="text-green-700">Activo</span>
                        @else
                            <span class="text-red-700">Inactivo</span>
                        @endif
                    </td>

                    <td class="p-4 flex gap-2">

                        <a href="/admin/categorias/mostrar/{{ $categoria->id }}"
                            class="text-blue-600">
                            Ver
                        </a>

                        <a href="/admin/categorias/editar/{{ $categoria->id }}"
                            class="text-yellow-600">
                            Editar
                        </a>

                        <form action="/admin/categorias/eliminar/{{ $categoria->id }}"
                            method="POST">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="text-red-600">
                                Eliminar
                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="5" class="p-6 text-center">
                        No hay categorías registradas.
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection