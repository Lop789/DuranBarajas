@extends('admin.admin')

@section('contenido')

<div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow">

    <h1 class="text-2xl font-bold text-gray-900 mb-6">
        Editar actividad
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

    <form
        action="/admin/actividades/actualizar/{{ $actividad->id }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        <div class="grid gap-6 mb-6 md:grid-cols-2">

            <div>

                <label class="block mb-2 text-sm font-medium text-gray-900">
                    Nombre de la actividad
                </label>

                <input
                    type="text"
                    name="nombre"
                    value="{{ old('nombre', $actividad->nombre) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                >

            </div>

            <div>

                <label class="block mb-2 text-sm font-medium text-gray-900">
                    Categoría
                </label>

                <select
                    name="categoria_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                >

                    @foreach ($categorias as $categoria)

                        <option
                            value="{{ $categoria->id }}"
                            {{ old('categoria_id', $actividad->categoria_id) == $categoria->id ? 'selected' : '' }}
                        >
                            {{ $categoria->nombre }}
                        </option>

                    @endforeach

                </select>

            </div>

            <div>

                <label class="block mb-2 text-sm font-medium text-gray-900">
                    Unidad
                </label>

                <input
                    type="text"
                    name="unidad"
                    value="{{ old('unidad', $actividad->unidad) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                >

            </div>

            <div>

                <label class="block mb-2 text-sm font-medium text-gray-900">
                    Factor de emisión
                </label>

                <input
                    type="number"
                    step="0.0001"
                    min="0"
                    name="factor_emision"
                    value="{{ old('factor_emision', $actividad->factor_emision) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                >

            </div>

            <div>

                <label class="block mb-2 text-sm font-medium text-gray-900">
                    Tipo
                </label>

                <input
                    type="text"
                    name="tipo"
                    value="{{ old('tipo', $actividad->tipo) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                >

            </div>

            <div>

                <label class="block mb-2 text-sm font-medium text-gray-900">
                    Imagen
                </label>

                <input
                    type="text"
                    name="imagen"
                    value="{{ old('imagen', $actividad->imagen) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                >

            </div>

        </div>

        <div class="mb-6">

            <label class="block mb-2 text-sm font-medium text-gray-900">
                Descripción
            </label>

            <textarea
                name="descripcion"
                rows="4"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300"
            >{{ old('descripcion', $actividad->descripcion) }}</textarea>

        </div>

        <div class="mb-6">

            <label class="block mb-2 text-sm font-medium text-gray-900">
                Estado
            </label>

            <select
                name="estado"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
            >

                <option
                    value="1"
                    {{ $actividad->estado ? 'selected' : '' }}
                >
                    Activo
                </option>

                <option
                    value="0"
                    {{ !$actividad->estado ? 'selected' : '' }}
                >
                    Inactivo
                </option>

            </select>

        </div>

        <div class="flex gap-3">

            <button
                type="submit"
                class="text-white bg-green-700 hover:bg-green-800 font-medium rounded-lg text-sm px-5 py-2.5"
            >
                Actualizar actividad
            </button>

            <a
                href="/admin/actividades/listado"
                class="text-gray-900 bg-gray-200 hover:bg-gray-300 font-medium rounded-lg text-sm px-5 py-2.5"
            >
                Cancelar
            </a>

        </div>

    </form>

</div>

@endsection