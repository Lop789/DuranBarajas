@extends('admin.admin')

@section('contenido')

<div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow">

    <h1 class="text-2xl font-bold text-gray-900 mb-6">
        Registrar actividad
    </h1>

    <form action="/admin/actividades/guardar" method="POST">

        @csrf

        <div class="grid gap-6 mb-6 md:grid-cols-2">

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">
                    Nombre de la actividad
                </label>

                <input type="text"
                    name="nombre"
                    value="{{ old('nombre') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                    focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                    placeholder="Ej. Uso de automóvil"
                    required>
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">
                    Categoría
                </label>

                <select name="categoria_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                    rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                    required>

                    <option value="">Selecciona una categoría</option>

                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}">
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">
                    Unidad
                </label>

                <input type="text"
                    name="unidad"
                    value="{{ old('unidad') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                    focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                    placeholder="Ej. kilómetros"
                    required>
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">
                    Factor de emisión
                </label>

                <input type="number"
                    name="factor_emision"
                    value="{{ old('factor_emision') }}"
                    step="0.01"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                    focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                    placeholder="0.00"
                    required>
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">
                    Tipo
                </label>

                <select name="tipo"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                    rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                    required>

                    <option value="">Selecciona un tipo</option>
                    <option value="directa">Directa</option>
                    <option value="indirecta">Indirecta</option>

                </select>
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">
                    Imagen
                </label>

                <input type="text"
                    name="imagen"
                    value="{{ old('imagen') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                    focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                    placeholder="Nombre o ruta de imagen">
            </div>

        </div>

        <div class="mb-6">

            <label class="block mb-2 text-sm font-medium text-gray-900">
                Descripción
            </label>

            <textarea name="descripcion"
                rows="4"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50
                rounded-lg border border-gray-300 focus:ring-green-500
                focus:border-green-500"
                placeholder="Describe la actividad">{{ old('descripcion') }}</textarea>

        </div>

        <button type="submit"
            class="text-white bg-green-700 hover:bg-green-800 focus:ring-4
            focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5">
            Guardar actividad
        </button>

    </form>

</div>

@endsection