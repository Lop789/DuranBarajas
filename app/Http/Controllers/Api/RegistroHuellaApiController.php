<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RegistroHuella;
use App\Models\Actividad;
use Illuminate\Http\Request;

class RegistroHuellaApiController extends Controller
{
    public function index()
    {
        $registros = RegistroHuella::with([
            'usuario',
            'actividad'
        ])->orderBy('id', 'desc')->get();

        return response()->json([
            'success' => true,
            'data' => $registros
        ]);
    }

    public function show(RegistroHuella $registroHuella)
    {
        $registroHuella->load([
            'usuario',
            'actividad'
        ]);

        return response()->json([
            'success' => true,
            'data' => $registroHuella
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'actividad_id' => 'required|exists:actividades,id',
            'cantidad' => 'required|numeric|min:0',
            'fecha' => 'required|date',
            'observaciones' => 'nullable',
        ]);

        $actividad = Actividad::findOrFail($request->actividad_id);

        $impacto = $request->cantidad * $actividad->factor_emision;

        $registro = RegistroHuella::create([
            'usuario_id' => $request->usuario_id,
            'actividad_id' => $request->actividad_id,
            'cantidad' => $request->cantidad,
            'unidad' => $actividad->unidad,
            'impacto_calculado' => $impacto,
            'fecha' => $request->fecha,
            'observaciones' => $request->observaciones,
            'estado' => true,
        ]);

        $registro->load([
            'usuario',
            'actividad'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Registro de huella creado correctamente.',
            'data' => $registro
        ], 201);
    }

    public function update(Request $request, RegistroHuella $registroHuella)
    {
        $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'actividad_id' => 'required|exists:actividades,id',
            'cantidad' => 'required|numeric|min:0',
            'fecha' => 'required|date',
            'observaciones' => 'nullable',
            'estado' => 'required|boolean',
        ]);

        $actividad = Actividad::findOrFail($request->actividad_id);

        $impacto = $request->cantidad * $actividad->factor_emision;

        $registroHuella->update([
            'usuario_id' => $request->usuario_id,
            'actividad_id' => $request->actividad_id,
            'cantidad' => $request->cantidad,
            'unidad' => $actividad->unidad,
            'impacto_calculado' => $impacto,
            'fecha' => $request->fecha,
            'observaciones' => $request->observaciones,
            'estado' => $request->estado,
        ]);

        $registroHuella->load([
            'usuario',
            'actividad'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Registro de huella actualizado correctamente.',
            'data' => $registroHuella
        ]);
    }

    public function destroy(RegistroHuella $registroHuella)
    {
        $registroHuella->delete();

        return response()->json([
            'success' => true,
            'message' => 'Registro de huella eliminado correctamente.'
        ]);
    }
}