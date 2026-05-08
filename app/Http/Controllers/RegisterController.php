<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DiagnosticResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function create()
    {
        // Pre-fill email if user comes from a pending diagnostic
        $diagnosticEmail = Session::get('pending_diagnostic_email');
        return view('auth.register', compact('diagnosticEmail'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre'            => 'required|string|max:255',
            'apellido'          => 'required|string|max:255',
            'genero'            => 'required|in:Femenino,Masculino,Otros',
            'fecha_nacimiento'  => 'required|date|before:today',
            'email'             => 'required|string|email|max:255|unique:users',
            'password'          => 'required|string|min:8|confirmed',
            'telefono'          => 'required|string|max:255',
            'cargo'             => 'required|string|max:255',
            'institucion'       => 'required|string|max:255',
            'fecha_ingreso'     => 'required|date',
            'profesional'            => 'required|string|max:255',
            'universidad'            => 'required|string|max:255',
            'acepta_terminos'         => 'accepted',
            'acepta_obligaciones_pfizer' => 'accepted',
        ]);

        $user = User::create([
            'name'             => trim($validatedData['nombre'] . ' ' . $validatedData['apellido']),
            'email'            => $validatedData['email'],
            'password'         => $validatedData['password'],
            'text_password'    => $validatedData['password'],
            'nombre'           => $validatedData['nombre'],
            'apellido'         => $validatedData['apellido'],
            'telefono'         => $validatedData['telefono'],
            'genero'           => $validatedData['genero'],
            'fecha_nacimiento' => $validatedData['fecha_nacimiento'],
            'cargo'            => $validatedData['cargo'],
            'institucion'      => $validatedData['institucion'],
            'fecha_ingreso'    => $validatedData['fecha_ingreso'],
            'profesional'               => $validatedData['profesional'],
            'universidad'               => $validatedData['universidad'],
            'acepta_obligaciones_pfizer' => true,
        ]);

        // Link any pending diagnostic result that matches this email
        $pendingResultId = Session::get('pending_diagnostic_result_id');
        if ($pendingResultId) {
            DiagnosticResult::where('id', $pendingResultId)
                ->whereNull('user_id')
                ->update(['user_id' => $user->id]);

            Session::forget(['pending_diagnostic_result_id', 'pending_diagnostic_email']);
        }

        // Also retroactively link older unlinked results for this email
        DiagnosticResult::where('email', $user->email)
            ->whereNull('user_id')
            ->update(['user_id' => $user->id]);

        return redirect()->route('home')->with('success', 'Usuario creado exitosamente.');
    }
}
