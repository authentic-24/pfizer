<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'genero' => 'required|in:Femenino,Masculino,Otros',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'telefono' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
            'institucion' => 'required|string|max:255',
            'fecha_ingreso' => 'required|date',
            'profesional' => 'required|string|max:255',
            'universidad' => 'required|string|max:255',
        ]);

        // Create a new user (assuming you have a User model)
        $user = User::create([
            // 'name' exists in the users table schema; compose it from nombre + apellido
            'name' => trim($validatedData['nombre'] . ' ' . $validatedData['apellido']),
            'email' => $validatedData['email'],
            // User model casts 'password' => 'hashed', so pass the plain password and let the model hash it
            'password' => $validatedData['password'],
            'nombre' => $validatedData['nombre'],
            'apellido' => $validatedData['apellido'],
            'telefono' => $validatedData['telefono'],
            'genero' => $validatedData['genero'],
            'cargo' => $validatedData['cargo'],
            'institucion' => $validatedData['institucion'],
            'fecha_ingreso' => $validatedData['fecha_ingreso'],
            'profesional' => $validatedData['profesional'],
            'universidad' => $validatedData['universidad'],
        ]);

        return redirect()->route('home')->with('success', 'Usuario creado exitosamente.');
    }
}
