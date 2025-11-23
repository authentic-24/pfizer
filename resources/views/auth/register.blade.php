@extends('layouts.app')

@section('title', 'Authentic Learn - Registro')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <h2 class="h4 fw-bold text-dark mb-2">Registro</h2>
                        <p class="text-muted small">Crea tu cuenta</p>
                    </div>
                    
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate>
                        @csrf

                        <div class="card p-3 mb-3 shadow-sm"  style="background: #CFEAD6; border: none;border-radius:12px;">
                            <div class="row gx-3 gy-3">
                                <div class="col-md-6">
                                    <div class="input-group input-line">
                                        <span class="input-group-text bg-transparent border-0 text-muted"><i class="bi bi-person"></i></span>
                                        <input type="text" name="nombre" id="nombre" class="form-control input-line-field" placeholder="Nombre *" value="{{ old('nombre') }}" required>
                                    </div>
                                    @error('nombre')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group input-line">
                                        <span class="input-group-text bg-transparent border-0 text-muted"><i class="bi bi-person"></i></span>
                                        <input type="text" name="apellido" id="apellido" class="form-control input-line-field" placeholder="Apellido" value="{{ old('apellido') }}">
                                    </div>
                                    @error('apellido')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group input-line">
                                        <span class="input-group-text bg-transparent border-0 text-muted"><i class="bi bi-envelope"></i></span>
                                        <input type="email" name="email" id="email" class="form-control input-line-field" placeholder="Correo electrónico *" value="{{ old('email') }}" required>
                                    </div>
                                    @error('email')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group input-line">
                                        <span class="input-group-text bg-transparent border-0 text-muted"><i class="bi bi-telephone"></i></span>
                                        <input type="tel" name="telefono" id="telefono" class="form-control input-line-field" placeholder="Teléfono *" value="{{ old('telefono') }}" required>
                                    </div>
                                    @error('telefono')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group input-line">
                                        <span class="input-group-text bg-transparent border-0 text-muted"><i class="bi bi-lock"></i></span>
                                        <input type="password" name="password" id="password" class="form-control input-line-field" placeholder="Contraseña *" required>
                                        <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password')">
                                            <i class="bi bi-eye" id="togglePassword"></i>
                                        </button>
                                    </div>
                                    @error('password')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group input-line">
                                        <span class="input-group-text bg-transparent border-0 text-muted"><i class="bi bi-lock"></i></span>
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-line-field" placeholder="Confirmar contraseña *" required>
                                        <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password_confirmation')">
                                            <i class="bi bi-eye" id="togglePasswordConfirm"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group input-line">
                                        <span class="input-group-text bg-transparent border-0 text-muted"><i class="bi bi-building"></i></span>
                                        <input type="text" name="universidad" id="universidad" class="form-control input-line-field" placeholder="Universidad *" value="{{ old('universidad') }}" required>
                                    </div>
                                    @error('universidad')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group input-line">
                                        <span class="input-group-text bg-transparent border-0 text-muted"><i class="bi bi-briefcase"></i></span>
                                        <input type="text" name="profesional" id="profesional" class="form-control input-line-field" placeholder="Profesión / Especialidad" value="{{ old('profesional') }}">
                                    </div>
                                    @error('profesional')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group input-line">
                                        <span class="input-group-text bg-transparent border-0 text-muted"><i class="bi bi-building"></i></span>
                                        <input type="text" name="institucion" id="institucion" class="form-control input-line-field" placeholder="Institución o empresa *" value="{{ old('institucion') }}" required>
                                    </div>
                                    @error('institucion')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group input-line">
                                        <span class="input-group-text bg-transparent border-0 text-muted"><i class="bi bi-calendar"></i></span>
                                        <input type="date" name="fecha_ingreso" id="fecha_ingreso" class="form-control input-line-field" value="{{ old('fecha_ingreso') }}" required aria-describedby="fechaHelp">
                                    </div>
                                    <small id="fechaHelp" class="text-muted d-block mt-1">Fecha de ingreso a la institución o empresa</small>
                                    @error('fecha_ingreso')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group input-line">
                                        <span class="input-group-text bg-transparent border-0 text-muted"><i class="bi bi-person-badge"></i></span>
                                        <input type="text" name="cargo" id="cargo" class="form-control input-line-field" placeholder="Cargo" value="{{ old('cargo') }}">
                                    </div>
                                    @error('cargo')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 text-center">
                            <div class="form-check d-inline-block">
                                <input type="checkbox" name="acepta_terminos" id="acepta_terminos" class="form-check-input" value="1" {{ old('acepta_terminos') ? 'checked' : '' }} required>
                                <label class="form-check-label small ms-2" for="acepta_terminos">
                                    Acepto los <a href="{{ route('policies-data.index') }}" target="_blank">términos y condiciones</a> *
                                </label>
                                @error('acepta_terminos')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" id="btnRegistro" class="btn btn-pharma btn-lg" disabled style="border-radius:12px;">
                                Crear Cuenta
                            </button>
                        </div>

                        <div class="text-center">
                            <small class="text-muted">¿Necesitas ayuda? <a href="https://wa.me/573334002303" target="_blank">Contáctanos</a></small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Manejar checkbox de términos y condiciones
    const checkboxTerminos = document.getElementById('acepta_terminos');
    const btnRegistro = document.getElementById('btnRegistro');
    
    function toggleRegistroButton() {
        if (checkboxTerminos.checked) {
            btnRegistro.disabled = false;
        } else {
            btnRegistro.disabled = true;
        }
    }
    
    checkboxTerminos.addEventListener('change', function() {
        toggleRegistroButton();
    });
    
    // Inicializar estado del botón
    toggleRegistroButton();
});

// Función para mostrar/ocultar contraseñas
function togglePassword(fieldId) {
    const passwordField = document.getElementById(fieldId);
    const toggleIcon = fieldId === 'password' ? 
        document.getElementById('togglePassword') : 
        document.getElementById('togglePasswordConfirm');
    
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        toggleIcon.classList.remove('bi-eye');
        toggleIcon.classList.add('bi-eye-slash');
    } else {
        passwordField.type = 'password';
        toggleIcon.classList.remove('bi-eye-slash');
        toggleIcon.classList.add('bi-eye');
    }
}
</script>

<style>
    /* Line-style inputs */
    .input-line .input-group-text {
        border: none;
        background: transparent;
        color: rgba(30,41,59,0.8);
        font-size: 1.05rem;
        padding-right: 0.6rem;
    }

    .input-line-field {
        border: none;
        border-bottom: 1px solid rgba(99,102,241,0.12);
        border-radius: 0;
        background: transparent;
        box-shadow: none;
        padding-left: 0.5rem;
        height: 46px;
    }

    .input-line-field:focus {
        outline: none;
        box-shadow: none;
        /* Mantener fondo verde claro y sin borde blanco al hacer focus */
        background: #CFEAD6 !important;
        border: none !important;
        border-bottom: 1px solid rgba(0,87,184,0.9) !important;
        -webkit-box-shadow: none !important;
    }

    /* Evitar que el autofill del navegador muestre fondo blanco */
    input.input-line-field:-webkit-autofill,
    input.input-line-field:-webkit-autofill:focus,
    input.input-line-field:-webkit-autofill:hover {
        -webkit-box-shadow: 0 0 0px 1000px #CFEAD6 inset !important;
        box-shadow: 0 0 0px 1000px #CFEAD6 inset !important;
        -webkit-text-fill-color: #0f172a !important;
    }

    .card .form-check-input {
        width: 18px;
        height: 18px;
    }

    /* Small responsive tweak */
    @media (max-width: 576px) {
        .input-line-field { height:44px; }
    }

    /* Estilos para el botón deshabilitado: usar color del focus (azul intenso) */
    .btn-pharma:disabled,
    .btn-pharma[disabled] {
        background: rgba(0,87,184,0.95) !important;
        color: #ffffff !important;
        border: none !important;
        opacity: 1 !important;
        box-shadow: 0 6px 18px rgba(0,87,184,0.12) !important;
        cursor: not-allowed !important;
    }

    .btn-pharma:disabled:hover,
    .btn-pharma[disabled]:hover {
        transform: none !important;
        filter: none !important;
    }
</style>

@endsection
