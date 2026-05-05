@extends('layouts.app')

@section('title', 'Authentic Learn - Registro')

@section('content')
<div class="register-bg py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-9 col-lg-10 col-md-12 col-12">

                {{-- Encabezado fuera de la tarjeta --}}
                <div class="text-center mb-4">
                    {{-- <div class="register-badge mb-3">
                        <i class="bi bi-person-plus-fill"></i>
                    </div> --}}
                    <h1 class="fw-bold mb-1" style="font-family:'Inter',sans-serif;font-size:1.9rem;color:#1a2e44;">Crea tu cuenta</h1>
                    {{-- <p class="text-muted mb-0">Completa el formulario para unirte a la plataforma</p> --}}
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if($diagnosticEmail ?? null)
                <div class="alert border-0 shadow-sm mb-4 p-4" style="border-radius:14px;background:linear-gradient(135deg,#eff6ff,#dbeafe);">
                    <div class="d-flex align-items-start gap-3">
                        <i class="bi bi-clipboard-check-fill flex-shrink-0" style="font-size:1.6rem;color:#2563eb;margin-top:2px;"></i>
                        <div>
                            <h6 class="fw-bold mb-1" style="color:#1e3a8a;">¡Tienes un diagnóstico pendiente de guardar!</h6>
                            <p class="mb-0 small" style="color:#1d4ed8;">
                                Completa tu registro con el correo <strong>{{ $diagnosticEmail }}</strong> para que tus resultados del diagnóstico queden vinculados a tu cuenta.
                            </p>
                        </div>
                    </div>
                </div>
                @endif

                <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate>
                    @csrf

                    {{-- ── Sección 1: Datos personales ── --}}
                    <div class="register-section mb-4">
                        <div class="section-header">
                            <span class="section-icon"><i class="bi bi-person-circle"></i></span>
                            <span class="section-title">Datos personales</span>
                        </div>
                        <div class="section-body">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label label-sm">Nombre <span class="text-danger">*</span></label>
                                    <div class="input-group input-fancy">
                                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                                        <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" placeholder="Tu nombre" value="{{ old('nombre') }}" required>
                                    </div>
                                    @error('nombre')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label label-sm">Apellido <span class="text-danger">*</span></label>
                                    <div class="input-group input-fancy">
                                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                                        <input type="text" name="apellido" id="apellido" class="form-control @error('apellido') is-invalid @enderror" placeholder="Tu apellido" value="{{ old('apellido') }}" required>
                                    </div>
                                    @error('apellido')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label label-sm">Género <span class="text-danger">*</span></label>
                                    <div class="input-group input-fancy">
                                        <span class="input-group-text"><i class="bi bi-gender-ambiguous"></i></span>
                                        <select name="genero" id="genero" class="form-select @error('genero') is-invalid @enderror" required>
                                            <option value="">Selecciona...</option>
                                            <option value="Femenino" {{ old('genero') == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                                            <option value="Masculino" {{ old('genero') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                                            <option value="Otros" {{ old('genero') == 'Otros' ? 'selected' : '' }}>Otros</option>
                                        </select>
                                    </div>
                                    @error('genero')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label label-sm">Fecha de nacimiento <span class="text-danger">*</span></label>
                                    <div class="input-group input-fancy">
                                        <span class="input-group-text"><i class="bi bi-cake2"></i></span>
                                        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control @error('fecha_nacimiento') is-invalid @enderror" value="{{ old('fecha_nacimiento') }}" required>
                                    </div>
                                    @error('fecha_nacimiento')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ── Sección 2: Contacto y acceso ── --}}
                    <div class="register-section mb-4">
                        <div class="section-header">
                            <span class="section-icon"><i class="bi bi-shield-lock"></i></span>
                            <span class="section-title">Contacto y acceso</span>
                        </div>
                        <div class="section-body">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label label-sm">Correo electrónico <span class="text-danger">*</span></label>
                                    <div class="input-group input-fancy">
                                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="correo@ejemplo.com" value="{{ old('email', $diagnosticEmail ?? '') }}" required>
                                    </div>
                                    @error('email')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label label-sm">Teléfono <span class="text-danger">*</span></label>
                                    <div class="input-group input-fancy">
                                        <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                        <input type="tel" name="telefono" id="telefono" class="form-control @error('telefono') is-invalid @enderror" placeholder="+57 300 000 0000" value="{{ old('telefono') }}" required>
                                    </div>
                                    @error('telefono')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label label-sm">Contraseña <span class="text-danger">*</span></label>
                                    <div class="input-group input-fancy">
                                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Mínimo 8 caracteres" required>
                                        <button class="btn btn-icon-toggle" type="button" onclick="togglePassword('password', 'togglePassword')">
                                            <i class="bi bi-eye" id="togglePassword"></i>
                                        </button>
                                    </div>
                                    @error('password')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label label-sm">Confirmar contraseña <span class="text-danger">*</span></label>
                                    <div class="input-group input-fancy">
                                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Repite tu contraseña" required>
                                        <button class="btn btn-icon-toggle" type="button" onclick="togglePassword('password_confirmation', 'togglePasswordConfirm')">
                                            <i class="bi bi-eye" id="togglePasswordConfirm"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ── Sección 3: Información profesional ── --}}
                    <div class="register-section mb-4">
                        <div class="section-header">
                            <span class="section-icon"><i class="bi bi-briefcase"></i></span>
                            <span class="section-title">Información profesional</span>
                        </div>
                        <div class="section-body">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label label-sm">Universidad <span class="text-danger">*</span></label>
                                    <div class="input-group input-fancy">
                                        <span class="input-group-text"><i class="bi bi-mortarboard"></i></span>
                                        <input type="text" name="universidad" id="universidad" class="form-control @error('universidad') is-invalid @enderror" placeholder="Nombre de tu universidad" value="{{ old('universidad') }}" required>
                                    </div>
                                    @error('universidad')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label label-sm">Profesión / Especialidad <span class="text-danger">*</span></label>
                                    <div class="input-group input-fancy">
                                        <span class="input-group-text"><i class="bi bi-briefcase"></i></span>
                                        <input type="text" name="profesional" id="profesional" class="form-control @error('profesional') is-invalid @enderror" placeholder="Ej: Químico Farmacéutico" value="{{ old('profesional') }}" required>
                                    </div>
                                    @error('profesional')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label label-sm">Institución o empresa <span class="text-danger">*</span></label>
                                    <div class="input-group input-fancy">
                                        <span class="input-group-text"><i class="bi bi-building"></i></span>
                                        <input type="text" name="institucion" id="institucion" class="form-control @error('institucion') is-invalid @enderror" placeholder="Donde trabajas actualmente" value="{{ old('institucion') }}" required>
                                    </div>
                                    @error('institucion')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label label-sm">Cargo <span class="text-danger">*</span></label>
                                    <div class="input-group input-fancy">
                                        <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                                        <input type="text" name="cargo" id="cargo" class="form-control @error('cargo') is-invalid @enderror" placeholder="Tu cargo actual" value="{{ old('cargo') }}" required>
                                    </div>
                                    @error('cargo')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label label-sm">Fecha de ingreso a la institución <span class="text-danger">*</span></label>
                                    <div class="input-group input-fancy">
                                        <span class="input-group-text"><i class="bi bi-calendar-check"></i></span>
                                        <input type="date" name="fecha_ingreso" id="fecha_ingreso" class="form-control @error('fecha_ingreso') is-invalid @enderror" value="{{ old('fecha_ingreso') }}" required>
                                    </div>
                                    @error('fecha_ingreso')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ── Términos y envío ── --}}
                    <div class="register-section mb-4">
                        <div class="section-body">

                            {{-- 1. Políticas de privacidad --}}
                            <div class="d-flex align-items-start gap-3 p-3" style="background:#f0fdf4;border-radius:10px;border:1px solid #bbf7d0;">
                                <input type="checkbox" name="acepta_terminos" id="acepta_terminos" class="form-check-input mt-1 flex-shrink-0" value="1" {{ old('acepta_terminos') ? 'checked' : '' }} required style="width:20px;height:20px;">
                                <label class="form-check-label small lh-base" for="acepta_terminos" style="color:#374151;">
                                    He leído y acepto las <a href="{{ route('policies-data.index') }}" target="_blank" class="fw-semibold text-success">políticas de privacidad</a> y los términos y condiciones de uso. <span class="text-danger">*</span>
                                </label>
                            </div>
                            @error('acepta_terminos')
                                <div class="text-danger small mt-2 ms-1">{{ $message }}</div>
                            @enderror

                            {{-- 2. Política de manejo de datos --}}
                            <div class="d-flex align-items-start gap-3 p-3 mt-3" style="background:#f0f9ff;border-radius:10px;border:1px solid #bae6fd;">
                                <input type="checkbox" name="acepta_manejo_datos" id="acepta_manejo_datos" class="form-check-input mt-1 flex-shrink-0" value="1" {{ old('acepta_manejo_datos') ? 'checked' : '' }} required style="width:20px;height:20px;">
                                <label class="form-check-label small lh-base" for="acepta_manejo_datos" style="color:#374151;">
                                    He leído y acepto la <a href="{{ route('policies-data.manejo-datos') }}" target="_blank" class="fw-semibold text-info">política de manejo de datos</a> personales. <span class="text-danger">*</span>
                                </label>
                            </div>
                            @error('acepta_manejo_datos')
                                <div class="text-danger small mt-2 ms-1">{{ $message }}</div>
                            @enderror

                            {{-- 3. Obligaciones del contratista (Pfizer) --}}
                            <div class="d-flex align-items-start gap-3 p-3 mt-3" style="background:#fff7ed;border-radius:10px;border:1px solid #fed7aa;">
                                <input type="checkbox" name="acepta_obligaciones_pfizer" id="acepta_obligaciones_pfizer" class="form-check-input mt-1 flex-shrink-0" value="1" {{ old('acepta_obligaciones_pfizer') ? 'checked' : '' }} required style="width:20px;height:20px;">
                                <label class="form-check-label small lh-base" for="acepta_obligaciones_pfizer" style="color:#374151;">
                                    He leído y acepto las <strong>obligaciones del contratista</strong>: <em>"Informar a PFIZER sobre cualquier evento adverso que involucre un producto de PFIZER y que sea conocido en el marco de este Contrato. El reporte debe comunicarse a través de <a href="mailto:COL.AEReporting@pfizer.com" class="fw-semibold text-warning">COL.AEReporting@pfizer.com</a> en un plazo no mayor a veinticuatro (24) horas de conocido el evento adverso."</em> <span class="text-danger">*</span>
                                </label>
                            </div>
                            @error('acepta_obligaciones_pfizer')
                                <div class="text-danger small mt-2 ms-1">{{ $message }}</div>
                            @enderror

                            <div class="d-grid mt-4">
                                <button type="submit" id="btnRegistro" class="btn btn-pharma btn-lg py-3" disabled style="border-radius:12px;font-size:1.05rem;letter-spacing:0.3px;">
                                    <i class="bi bi-person-check me-2"></i>Crear Cuenta
                                </button>
                            </div>

                            <div class="text-center mt-3">
                                <small class="text-muted">¿Necesitas ayuda? <a href="https://wa.me/573334002303" target="_blank" class="text-success fw-medium"><i class="bi bi-whatsapp me-1"></i>Contáctanos</a></small>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const checkboxTerminos      = document.getElementById('acepta_terminos');
    const checkboxManejoDatos   = document.getElementById('acepta_manejo_datos');
    const checkboxObligaciones  = document.getElementById('acepta_obligaciones_pfizer');
    const btnRegistro           = document.getElementById('btnRegistro');

    function toggleRegistroButton() {
        btnRegistro.disabled = !(
            checkboxTerminos.checked &&
            checkboxManejoDatos.checked &&
            checkboxObligaciones.checked
        );
    }

    checkboxTerminos.addEventListener('change', toggleRegistroButton);
    checkboxManejoDatos.addEventListener('change', toggleRegistroButton);
    checkboxObligaciones.addEventListener('change', toggleRegistroButton);
    toggleRegistroButton();
});

function togglePassword(fieldId, iconId) {
    const field = document.getElementById(fieldId);
    const icon  = document.getElementById(iconId);
    if (field.type === 'password') {
        field.type = 'text';
        icon.classList.replace('bi-eye', 'bi-eye-slash');
    } else {
        field.type = 'password';
        icon.classList.replace('bi-eye-slash', 'bi-eye');
    }
}
</script>

<style>
/* ── Fondo general ── */
.register-bg {
    background: linear-gradient(135deg, #f0fdf4 0%, #e8f5e9 50%, #f0f9ff 100%);
    min-height: 100vh;
}

/* ── Ícono de encabezado ── */
.register-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 64px; height: 64px;
    border-radius: 50%;
    background: linear-gradient(135deg, #22c55e, #16a34a);
    color: #fff;
    font-size: 1.8rem;
    box-shadow: 0 8px 24px rgba(34,197,94,0.35);
}

/* ── Secciones del formulario ── */
.register-section {
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 2px 16px rgba(0,0,0,0.06);
    overflow: hidden;
    border: 1px solid #e2e8f0;
}

.section-header {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 14px 24px;
    background: linear-gradient(90deg, #1a4731 0%, #166534 100%);
    border-bottom: none;
}

.section-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 32px; height: 32px;
    background: rgba(255,255,255,0.15);
    border-radius: 8px;
    color: #fff;
    font-size: 1rem;
}

.section-title {
    font-weight: 600;
    font-size: 0.9rem;
    color: #fff;
    letter-spacing: 0.5px;
    text-transform: uppercase;
}

.section-body {
    padding: 24px;
}

/* ── Inputs ── */
.label-sm {
    font-size: 0.82rem;
    font-weight: 600;
    color: #374151;
    margin-bottom: 6px;
    letter-spacing: 0.2px;
}

.input-fancy {
    border-radius: 10px !important;
    overflow: hidden;
    box-shadow: 0 1px 4px rgba(0,0,0,0.06);
}

.input-fancy .input-group-text {
    background: #f8fafc;
    border: 1px solid #d1d5db;
    border-right: none;
    color: #6b7280;
    padding: 0 14px;
    font-size: 1rem;
}

.input-fancy .form-control,
.input-fancy .form-select {
    border: 1px solid #d1d5db;
    border-left: none;
    background: #fff;
    height: 48px;
    font-size: 0.92rem;
    color: #1f2937;
    box-shadow: none;
}

.input-fancy .form-control:focus,
.input-fancy .form-select:focus {
    border-color: #22c55e;
    box-shadow: none;
    background: #fff;
}

.input-fancy .form-control:focus + .input-group-text,
.input-fancy .input-group-text:has(+ .form-control:focus) {
    border-color: #22c55e;
}

/* Borde izquierdo del ícono al hacer focus */
.input-fancy:focus-within .input-group-text {
    border-color: #22c55e;
}

/* ── Botón mostrar contraseña ── */
.btn-icon-toggle {
    background: #f8fafc;
    border: 1px solid #d1d5db;
    border-left: none;
    color: #6b7280;
    padding: 0 14px;
    font-size: 0.95rem;
}

.btn-icon-toggle:hover {
    background: #f1f5f9;
    color: #374151;
}

/* ── Botón principal ── */
.btn-pharma:disabled {
    background: rgba(0,87,184,0.85) !important;
    color: #ffffff !important;
    border: none !important;
    opacity: 1 !important;
    cursor: not-allowed !important;
}

/* ── Autofill ── */
input:-webkit-autofill,
input:-webkit-autofill:focus {
    -webkit-box-shadow: 0 0 0px 1000px #fff inset !important;
    -webkit-text-fill-color: #1f2937 !important;
}
</style>

@endsection
