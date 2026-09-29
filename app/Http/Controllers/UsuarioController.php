<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function listado()
    {
        $usuarios = Usuario::orderBy('id', 'desc')->get();

        return view('usuarios.listado', compact('usuarios'));
    }

    public function formulario()
    {
        return view('usuarios.formulario');
    }

    public function guardar(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => 'required|email|unique:usuarios,correo',
            'telefono' => 'nullable',
            'contrasena' => 'required|min:6',
        ]);

        Usuario::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'contrasena' => Hash::make($request->contrasena),
            'direccion' => $request->direccion,
            'imagen' => $request->imagen,
            'estado' => true,
        ]);

        return redirect('/admin/usuarios/listado')
            ->with('success', 'Usuario registrado correctamente.');
    }
    public function editar(Usuario $usuario)
{
    return view('usuarios.editar', compact('usuario'));
}
public function actualizar(Request $request, Usuario $usuario)
{
    $request->validate([
        'nombre' => 'required',
        'apellido' => 'required',
        'correo' => 'required|email|unique:usuarios,correo,' . $usuario->id,
        'telefono' => 'nullable',
        'direccion' => 'nullable',
        'contrasena' => 'nullable|min:6',
        'estado' => 'required|boolean',
    ]);

    $datos = [
        'nombre' => $request->nombre,
        'apellido' => $request->apellido,
        'correo' => $request->correo,
        'telefono' => $request->telefono,
        'direccion' => $request->direccion,
        'estado' => $request->estado,
    ];

    if ($request->filled('contrasena')) {
        $datos['contrasena'] = Hash::make($request->contrasena);
    }

    $usuario->update($datos);

    return redirect('/admin/usuarios/listado')
        ->with('success', 'Usuario actualizado correctamente.');
}
public function eliminar(Usuario $usuario)
{
    if ($usuario->registrosHuella()->exists()) {
        return redirect('/admin/usuarios/listado')
            ->with('error', 'No se puede eliminar el usuario porque tiene registros de huella asociados.');
    }

    $usuario->delete();

    return redirect('/admin/usuarios/listado')
        ->with('success', 'Usuario eliminado correctamente.');
}
}