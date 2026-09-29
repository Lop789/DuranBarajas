<?php

namespace App\Http\Controllers;

use App\Models\RegistroHuella;
use App\Models\Usuario;
use App\Models\Actividad;
use Illuminate\Http\Request;

class RegistroHuellaController extends Controller
{
    public function listado()
    {
        $registros = RegistroHuella::with(['usuario', 'actividad'])
            ->orderBy('id', 'desc')
            ->get();

        return view('registros_huella.listado', compact('registros'));
    }

    public function formulario()
    {
        $usuarios = Usuario::where('estado', true)->get();
        $actividades = Actividad::where('estado', true)->get();

        return view('registros_huella.formulario', compact(
            'usuarios',
            'actividades'
        ));
    }

    public function guardar(Request $request)
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

        RegistroHuella::create([
            'usuario_id' => $request->usuario_id,
            'actividad_id' => $request->actividad_id,
            'cantidad' => $request->cantidad,
            'unidad' => $actividad->unidad,
            'impacto_calculado' => $impacto,
            'fecha' => $request->fecha,
            'observaciones' => $request->observaciones,
            'estado' => true,
        ]);

        return redirect('/admin/registros-huella/listado')
            ->with('success', 'Registro de huella creado correctamente.');
    }

    public function editar(RegistroHuella $registroHuella)
    {
        $usuarios = Usuario::where('estado', true)->get();
        $actividades = Actividad::where('estado', true)->get();

        return view('registros_huella.editar', compact(
            'registroHuella',
            'usuarios',
            'actividades'
        ));
    }

    public function actualizar(Request $request, RegistroHuella $registroHuella)
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

        return redirect('/admin/registros-huella/listado')
            ->with('success', 'Registro de huella actualizado correctamente.');
    }

    public function eliminar(RegistroHuella $registroHuella)
    {
        $registroHuella->delete();

        return redirect('/admin/registros-huella/listado')
            ->with('success', 'Registro de huella eliminado correctamente.');
    }
}