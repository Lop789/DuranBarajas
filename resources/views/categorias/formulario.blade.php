@extends('admin.admin')

@section('contenido')

<div class="max-w-3xl mx-auto">

    <h1 class="text-3xl font-bold text-gray-900 mb-6">
        Registrar categoría
    </h1>

    <form action="/admin/categorias/registrar" method="POST"
        class="bg-white p-6 rounded-lg shadow">

        @csrf

        <div class="mb-4">
            <label class="block mb-2 font-medium">Nombre</label>
            <input type="text" name="nombre"
                class="w-full border rounded-lg p-2"
                required>
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-medium">Descripción</label>
            <textarea name="descripcion"
                class="w-full border rounded-lg p-2"></textarea>
        </div>

        <div class="mb-6">
            <label class="block mb-2 font-medium">Imagen</label>
            <input type="text" name="imagen"
                class="w-full border rounded-lg p-2"
                placeholder="URL o nombre de imagen">
        </div>

        <button type="submit"
            class="bg-green-700 text-white px-5 py-2 rounded-lg">
            Registrar categoría
        </button>

        <a href="/admin/categorias/listado"
            class="ml-2 text-gray-600">
            Cancelar
        </a>

    </form>

</div>

@endsection