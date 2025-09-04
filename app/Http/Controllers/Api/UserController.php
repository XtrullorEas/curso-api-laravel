<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'Lista de usuarios']);
    }

    public function store(Request $request)
    {
        // Lógica para crear un nuevo usuario
        return response()->json(['message' => 'Usuario creado']);
    }

    public function show($user)
    {
        // Lógica para mostrar un usuario específico
        return response()->json(['message' => "Detalles del usuario con ID: $user"]);
    }

    public function update(Request $request, $user)
    {
        // Lógica para actualizar un usuario específico
        return response()->json(['message' => "Usuario actualizado con ID: $user"]);
    }

    public function destroy($user)
    {
        // Lógica para eliminar un usuario específico
        return response()->json(['message' => "Usuario eliminado con ID: $user"]);
    }
}
