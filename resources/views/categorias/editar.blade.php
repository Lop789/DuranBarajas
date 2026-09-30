@extends('admin.admin')

@section('contenido')

<div class="max-w-3xl mx-auto">

    <h1 class="text-3xl font-bold text-gray-900 mb-6">
        Editar categoría
    </h1>

    <form action="/admin/categorias/actualizar/{{ $categoria->id }}"
        method="POST"
        class="bg-white p-6 rounded-lg shadow">

        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-2 font-medium">Nombre</label>

            <input type="text"
                name="nombre"
                value="{{ $categoria->nombre }}"
                class="w-full border rounded-lg p-2"
                required>
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-medium">
                Descripción
            </label>

            <textarea name="descripcion"
                class="w-full border rounded-lg p-2">{{ $categoria->descripcion }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-medium">
                Imagen
            </label>

            <input type="text"
                name="imagen"
                value="{{ $categoria->imagen }}"
                class="w-full border rounded-lg p-2">
        </div>

        <div class="mb-6">
            <label class="block mb-2 font-medium">
                Estado
            </label>

            <select name="estado"
                class="w-full border rounded-lg p-2">

                <option value="1"
                    {{ $categoria->estado ? 'selected' : '' }}>
                    Activo
                </option>

                <option value="0"
                    {{ !$categoria->estado ? 'selected' : '' }}>
                    Inactivo
                </option>

            </select>
        </div>

        <button type="submit"
            class="bg-green-700 text-white px-5 py-2 rounded-lg">
            Actualizar
        </button>

    </form>

</div>

@endsection