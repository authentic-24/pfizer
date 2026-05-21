@extends('layouts.app')

@section('title', 'Estadísticas - Acceso')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow-sm border-0" style="width: 100%; max-width: 400px;">
        <div class="card-body p-5">
            <div class="text-center mb-4">
                <i class="bi bi-bar-chart-line-fill text-primary" style="font-size: 2.5rem;"></i>
                <h4 class="fw-bold mt-2 mb-1">Estadísticas</h4>
                <p class="text-muted small">Ingresa tus credenciales para continuar</p>
            </div>

            @if ($errors->has('credentials'))
                <div class="alert alert-danger py-2 small">
                    {{ $errors->first('credentials') }}
                </div>
            @endif

            <form method="POST" action="{{ route('estadisticas.login.post') }}">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label fw-medium">Usuario</label>
                    <input
                        type="text"
                        id="username"
                        name="username"
                        class="form-control @error('username') is-invalid @enderror"
                        value="{{ old('username') }}"
                        autocomplete="username"
                        autofocus
                        required
                    >
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label fw-medium">Contraseña</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-control @error('password') is-invalid @enderror"
                        autocomplete="current-password"
                        required
                    >
                </div>
                <button type="submit" class="btn btn-primary w-100 fw-medium">
                    Ingresar
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
