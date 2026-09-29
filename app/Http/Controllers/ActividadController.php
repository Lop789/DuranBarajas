<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    public function listado()
    {
        $actividades = Actividad::with('categoria')
            ->orderBy('id', 'desc')
            ->get();

        return view('actividades.listado', compact('actividades'));
    }

    public function formulario()
    {
        $categorias = Categoria::where('estado', true)->get();

        return view('actividades.formulario', compact('categorias'));
    }

    public function guardar(Request $request)
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

        Actividad::create([
            'categoria_id' => $request->categoria_id,
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'unidad' => $request->unidad,
            'factor_emision' => $request->factor_emision,
            'tipo' => $request->tipo,
            'imagen' => $request->imagen,
            'estado' => true,
        ]);

        return redirect('/admin/actividades/listado')
            ->with('success', 'Actividad registrada correctamente.');
    }

    public function editar(Actividad $actividad)
    {
        $categorias = Categoria::where('estado', true)->get();

        return view('actividades.editar', compact(
            'actividad',
            'categorias'
        ));
    }

    public function actualizar(Request $request, Actividad $actividad)
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

        return redirect('/admin/actividades/listado')
            ->with('success', 'Actividad actualizada correctamente.');
    }

    public function eliminar(Actividad $actividad)
    {
        if ($actividad->registrosHuella()->exists()) {
            return redirect('/admin/actividades/listado')
                ->with(
                    'error',
                    'No se puede eliminar la actividad porque tiene registros de huella asociados.'
                );
        }

        $actividad->delete();

        return redirect('/admin/actividades/listado')
            ->with('success', 'Actividad eliminada correctamente.');
    }
}