<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioApiController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => Usuario::orderBy('id', 'desc')->get()
        ]);
    }

    public function show(Usuario $usuario)
    {
        return response()->json([
            'success' => true,
            'data' => $usuario
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => 'required|email|unique:usuarios,correo',
            'telefono' => 'nullable',
            'contrasena' => 'required|min:6',
        ]);

        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'contrasena' => Hash::make($request->contrasena),
            'direccion' => $request->direccion,
            'imagen' => $request->imagen,
            'estado' => true,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Usuario creado correctamente.',
            'data' => $usuario
        ], 201);
    }

    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => 'required|email|unique:usuarios,correo,' . $usuario->id,
            'telefono' => 'nullable',
            'contrasena' => 'nullable|min:6',
            'estado' => 'required|boolean',
        ]);

        $datos = [
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'imagen' => $request->imagen,
            'estado' => $request->estado,
        ];

        if ($request->filled('contrasena')) {
            $datos['contrasena'] = Hash::make($request->contrasena);
        }

        $usuario->update($datos);

        return response()->json([
            'success' => true,
            'message' => 'Usuario actualizado correctamente.',
            'data' => $usuario
        ]);
    }

    public function destroy(Usuario $usuario)
    {
        if ($usuario->registrosHuella()->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'No se puede eliminar el usuario porque tiene registros de huella asociados.'
            ], 409);
        }

        $usuario->delete();

        return response()->json([
            'success' => true,
            'message' => 'Usuario eliminado correctamente.'
        ]);
    }
}