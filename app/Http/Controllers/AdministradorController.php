<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdministradorController extends Controller
{
    public function listar()
    {
        $administradores = Administrador::orderBy('id', 'desc')->get();

        return view('administradores.listado', compact('administradores'));
    }

    public function vistaFormulario()
    {
        return view('administradores.formulario');
    }

    public function registrar(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'usuario' => 'required|unique:administradores,usuario',
            'rol' => 'required|in:superadmin,administrador,capturista',
            'correo' => 'required|email|unique:administradores,correo',
            'telefono' => 'nullable',
            'contrasena' => 'required|min:6',
            'direccion' => 'nullable',
            'imagen' => 'nullable',
        ]);

        Administrador::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'usuario' => $request->usuario,
            'rol' => $request->rol,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'contrasena' => Hash::make($request->contrasena),
            'direccion' => $request->direccion,
            'imagen' => $request->imagen,
            'estado' => true,
        ]);

        return redirect('/admin/administradores/listar')
            ->with('success', 'Administrador registrado correctamente.');
    }

    public function vistaEdicion(Administrador $administrador)
    {
        return view('administradores.editar', compact('administrador'));
    }

    public function actualizar(Request $request, Administrador $administrador)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'usuario' => 'required|unique:administradores,usuario,' . $administrador->id,
            'rol' => 'required|in:superadmin,administrador,capturista',
            'correo' => 'required|email|unique:administradores,correo,' . $administrador->id,
            'telefono' => 'nullable',
            'contrasena' => 'nullable|min:6',
            'direccion' => 'nullable',
            'imagen' => 'nullable',
            'estado' => 'required|boolean',
        ]);

        $datos = [
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'usuario' => $request->usuario,
            'rol' => $request->rol,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'imagen' => $request->imagen,
            'estado' => $request->estado,
        ];

        if ($request->filled('contrasena')) {
            $datos['contrasena'] = Hash::make($request->contrasena);
        }

        $administrador->update($datos);

        return redirect('/admin/administradores/listar')
            ->with('success', 'Administrador actualizado correctamente.');
    }

    public function vistaMostrar(Administrador $administrador)
    {
        return view('administradores.mostrar', compact('administrador'));
    }

    public function borrar(Administrador $administrador)
    {
        $administrador->delete();

        return redirect('/admin/administradores/listar')
            ->with('success', 'Administrador eliminado correctamente.');
    }
}