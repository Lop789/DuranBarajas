@extends('admin.admin')

@section('contenido')

<div class="max-w-3xl mx-auto">

    <div class="bg-white rounded-lg shadow p-8">

        <h1 class="text-3xl font-bold mb-6">
            Detalle de categoría
        </h1>

        <p class="mb-3">
            <strong>ID:</strong>
            {{ $categoria->id }}
        </p>

        <p class="mb-3">
            <strong>Nombre:</strong>
            {{ $categoria->nombre }}
        </p>

        <p class="mb-3">
            <strong>Descripción:</strong>
            {{ $categoria->descripcion }}
        </p>

        <p class="mb-6">
            <strong>Estado:</strong>

            {{ $categoria->estado ? 'Activo' : 'Inactivo' }}
        </p>

        <a href="/admin/categorias/listado"
            class="bg-green-700 text-white px-5 py-2 rounded-lg">
            Regresar
        </a>

    </div>

</div>

@endsection