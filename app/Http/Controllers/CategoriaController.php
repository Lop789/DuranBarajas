<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function listar()
    {
        $categorias = Categoria::orderBy('id', 'desc')->get();

        return view('categorias.listado', compact('categorias'));
    }

    public function vistaFormulario()
    {
        return view('categorias.formulario');
    }

    public function registrar(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable',
            'imagen' => 'nullable',
        ]);

        Categoria::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'estado' => true,
        ]);

        return redirect('/admin/categorias/listado')
            ->with('success', 'Categoría registrada correctamente.');
    }

    public function vistaEdicion(Categoria $categoria)
    {
        return view('categorias.editar', compact('categoria'));
    }

    public function actualizar(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable',
            'imagen' => 'nullable',
            'estado' => 'required|boolean',
        ]);

        $categoria->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'estado' => $request->estado,
        ]);

        return redirect('/admin/categorias/listado')
            ->with('success', 'Categoría actualizada correctamente.');
    }

    public function vistaMostrar(Categoria $categoria)
    {
        return view('categorias.mostrar', compact('categoria'));
    }

    public function borrar(Categoria $categoria)
    {
        if ($categoria->actividades()->exists()) {
            return redirect('/admin/categorias/listado')
                ->with('error', 'No se puede eliminar la categoría porque tiene actividades asociadas.');
        }

        $categoria->delete();

        return redirect('/admin/categorias/listado')
            ->with('success', 'Categoría eliminada correctamente.');
    }
}