@extends('admin.admin')

@section('contenido')

<div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow">

    <h1 class="text-2xl font-bold text-gray-900 mb-6">
        Registrar huella ecológica
    </h1>

    <form action="/admin/registros-huella/guardar" method="POST">

        @csrf

        <div class="grid gap-6 mb-6 md:grid-cols-2">

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">
                    Usuario
                </label>

                <select name="usuario_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                    rounded-lg focus:ring-green-500 focus:border-green-500
                    block w-full p-2.5"
                    required>

                    <option value="">Selecciona un usuario</option>

                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id }}">
                            {{ $usuario->nombre }} {{ $usuario->apellido }}
                        </option>
                    @endforeach

                </select>
            </div>


            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">
                    Actividad
                </label>

                <select name="actividad_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                    rounded-lg focus:ring-green-500 focus:border-green-500
                    block w-full p-2.5"
                    required>

                    <option value="">Selecciona una actividad</option>

                    @foreach($actividades as $actividad)
                        <option value="{{ $actividad->id }}">
                            {{ $actividad->nombre }}
                        </option>
                    @endforeach

                </select>
            </div>


            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">
                    Cantidad
                </label>

                <input type="number"
                    name="cantidad"
                    step="0.01"
                    value="{{ old('cantidad') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                    rounded-lg focus:ring-green-500 focus:border-green-500
                    block w-full p-2.5"
                    placeholder="Ej. 25"
                    required>
            </div>


            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">
                    Unidad
                </label>

                <input type="text"
                    name="unidad"
                    value="{{ old('unidad') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                    rounded-lg focus:ring-green-500 focus:border-green-500
                    block w-full p-2.5"
                    placeholder="Ej. kilómetros"
                    required>
            </div>


            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">
                    Fecha
                </label>

                <input type="date"
                    name="fecha"
                    value="{{ old('fecha') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                    rounded-lg focus:ring-green-500 focus:border-green-500
                    block w-full p-2.5"
                    required>
            </div>


            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">
                    Impacto generado
                </label>

                <input type="number"
                    name="impacto"
                    step="0.01"
                    value="{{ old('impacto') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                    rounded-lg focus:ring-green-500 focus:border-green-500
                    block w-full p-2.5"
                    placeholder="Ej. 5.25"
                    required>
            </div>

        </div>


        <button type="submit"
            class="text-white bg-green-700 hover:bg-green-800
            focus:ring-4 focus:ring-green-300 font-medium rounded-lg
            text-sm px-5 py-2.5">
            Guardar registro
        </button>

    </form>

</div>

@endsection