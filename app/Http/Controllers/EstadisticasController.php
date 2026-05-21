<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstadisticasController extends Controller
{
    // Credenciales de acceso
    private const USERNAME = 'admin';
    private const PASSWORD = 'pfizer2026';

    public function showLogin()
    {
        if (session('estadisticas_auth')) {
            return redirect()->route('estadisticas.index');
        }
        return view('estadisticas.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (
            $request->input('username') === self::USERNAME &&
            $request->input('password') === self::PASSWORD
        ) {
            $request->session()->put('estadisticas_auth', true);
            return redirect()->route('estadisticas.index');
        }

        return back()->withErrors(['credentials' => 'Usuario o contraseña incorrectos.'])->withInput(['username' => $request->input('username')]);
    }

    public function index()
    {
        if (!session('estadisticas_auth')) {
            return redirect()->route('estadisticas.login');
        }
        return view('estadisticas.index');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('estadisticas_auth');
        return redirect()->route('estadisticas.login');
    }
}
