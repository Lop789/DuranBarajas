<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Actividad;
use Illuminate\Http\Request;

class ActividadApiController extends Controller
{
    public function index()
    {
        $actividades = Actividad::with('categoria')
            ->orderBy('id', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $actividades
        ]);
    }

    public function show(Actividad $actividad)
    {
        $actividad->load('categoria');

        return response()->json([
            'success' => true,
            'data' => $actividad
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'nombre' => 'required',
            'descripcion' => 'nullable',
            'unidad' => 'required',
            'factor_emision' => 'required|numeric|min:0',
            'tipo' => 'required',
            'imagen' => 'nullable',
        ]);

        $actividad = Actividad::create([
            'categoria_id' => $request->categoria_id,
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'unidad' => $request->unidad,
            'factor_emision' => $request->factor_emision,
            'tipo' => $request->tipo,
            'imagen' => $request->imagen,
            'estado' => true,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Actividad creada correctamente.',
            'data' => $actividad
        ], 201);
    }

    public function update(Request $request, Actividad $actividad)
    {
        $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'nombre' => 'required',
            'descripcion' => 'nullable',
            'unidad' => 'required',
            'factor_emision' => 'required|numeric|min:0',
            'tipo' => 'required',
            'imagen' => 'nullable',
            'estado' => 'required|boolean',
        ]);

        $actividad->update([
            'categoria_id' => $request->categoria_id,
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'unidad' => $request->unidad,
            'factor_emision' => $request->factor_emision,
            'tipo' => $request->tipo,
            'imagen' => $request->imagen,
            'estado' => $request->estado,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Actividad actualizada correctamente.',
            'data' => $actividad
        ]);
    }

    public function destroy(Actividad $actividad)
    {
        if ($actividad->registrosHuella()->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'No se puede eliminar la actividad porque tiene registros de huella asociados.'
            ], 409);
        }

        $actividad->delete();

        return response()->json([
            'success' => true,
            'message' => 'Actividad eliminada correctamente.'
        ]);
    }
}