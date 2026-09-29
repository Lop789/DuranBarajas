@extends('admin.admin')

@section('contenido')

<div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow">

    <h1 class="text-2xl font-bold text-gray-900 mb-6">
        Editar registro de huella
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
        action="/admin/registros-huella/actualizar/{{ $registroHuella->id }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        <div class="grid gap-6 mb-6 md:grid-cols-2">

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">
                    Usuario
                </label>

                <select
                    name="usuario_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                >

                    @foreach ($usuarios as $usuario)

                        <option
                            value="{{ $usuario->id }}"
                            {{ old('usuario_id', $registroHuella->usuario_id) == $usuario->id ? 'selected' : '' }}
                        >
                            {{ $usuario->nombre }} {{ $usuario->apellido }}
                        </option>

                    @endforeach

                </select>
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">
                    Actividad
                </label>

                <select
                    name="actividad_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                >

                    @foreach ($actividades as $actividad)

                        <option
                            value="{{ $actividad->id }}"
                            {{ old('actividad_id', $registroHuella->actividad_id) == $actividad->id ? 'selected' : '' }}
                        >
                            {{ $actividad->nombre }}
                        </option>

                    @endforeach

                </select>
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">
                    Cantidad
                </label>

                <input
                    type="number"
                    step="0.01"
                    min="0"
                    name="cantidad"
                    value="{{ old('cantidad', $registroHuella->cantidad) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                >
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">
                    Fecha
                </label>

                <input
                    type="date"
                    name="fecha"
                    value="{{ old('fecha', $registroHuella->fecha) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                >
            </div>

        </div>

        <div class="mb-6">

            <label class="block mb-2 text-sm font-medium text-gray-900">
                Observaciones
            </label>

            <textarea
                name="observaciones"
                rows="4"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300"
            >{{ old('observaciones', $registroHuella->observaciones) }}</textarea>

        </div>

        <div class="mb-6">

            <label class="block mb-2 text-sm font-medium text-gray-900">
                Estado
            </label>

            <select
                name="estado"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
            >
                <option value="1" {{ $registroHuella->estado ? 'selected' : '' }}>
                    Activo
                </option>

                <option value="0" {{ !$registroHuella->estado ? 'selected' : '' }}>
                    Inactivo
                </option>
            </select>

        </div>

        <div class="flex gap-3">

            <button
                type="submit"
                class="text-white bg-green-700 hover:bg-green-800 font-medium rounded-lg text-sm px-5 py-2.5"
            >
                Actualizar registro
            </button>

            <a
                href="/admin/registros-huella/listado"
                class="text-gray-900 bg-gray-200 hover:bg-gray-300 font-medium rounded-lg text-sm px-5 py-2.5"
            >
                Cancelar
            </a>

        </div>

    </form>

</div>

@endsection