@extends('layouts.app')

@section('title', 'Authentic Learn - Resultados del Diagnóstico')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-12">

            {{-- Banner: usuario NO registrado --}}
            @if(!$isRegistered)
            <div class="alert alert-warning border-0 shadow-sm mb-4 p-4" style="border-radius:14px;background:linear-gradient(135deg,#fffbeb,#fef3c7);border-left:5px solid #f59e0b !important;">
                <div class="d-flex align-items-start gap-3">
                    <i class="bi bi-exclamation-triangle-fill text-warning flex-shrink-0" style="font-size:1.8rem;margin-top:2px;"></i>
                    <div>
                        <h6 class="fw-bold mb-1" style="color:#92400e;">¡Tus resultados aún no están guardados!</h6>
                        <p class="mb-3 small" style="color:#78350f;">
                            El correo <strong>{{ $email }}</strong> no tiene cuenta registrada. 
                            Crea tu cuenta para que tus resultados del diagnóstico queden vinculados a tu perfil.
                        </p>
                        <a href="{{ route('register') }}" class="btn btn-warning fw-semibold px-4 py-2" style="border-radius:10px;font-size:0.9rem;">
                            <i class="bi bi-person-plus-fill me-2"></i>Crear cuenta y guardar resultados
                        </a>
                    </div>
                </div>
            </div>
            @else
            <div class="alert alert-success border-0 shadow-sm mb-4 py-3 px-4" style="border-radius:14px;">
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-check-circle-fill text-success" style="font-size:1.3rem;"></i>
                    <span class="small fw-medium" style="color:#166534;">Resultados guardados y vinculados a tu cuenta (<strong>{{ $email }}</strong>).</span>
                </div>
            </div>
            @endif

            <div class="card shadow-sm" style="border-radius:14px;overflow:hidden;">
                <div class="card-header bg-success text-white text-center py-3">
                    <h4 class="mb-0">Resultados de autoconocimiento</h4>
                </div>
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        <h5>Correo Electrónico: {{ $email }}</h5>
                        <p class="text-muted">Fecha: {{ now()->format('d/m/Y H:i') }}</p>
                    </div>
                    
                    <div class="row text-center mb-4 g-3">
                        <div class="col-md-4 d-flex">
                            <div class="card border-primary h-100 w-100">
                                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                    <h6 class="card-title text-primary">Excel</h6>
                                    <h3 class="text-primary">{{ $scores['excel'] }}/{{ $totalQuestions['excel'] }}</h3>
                                    <p class="mb-0">{{ number_format(($scores['excel'] / $totalQuestions['excel']) * 100, 1) }}%</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex">
                            <div class="card border-success h-100 w-100">
                                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                    <h6 class="card-title text-success">Power BI</h6>
                                    <h3 class="text-success">{{ $scores['powerbi'] }}/{{ $totalQuestions['powerbi'] }}</h3>
                                    <p class="mb-0">{{ number_format(($scores['powerbi'] / $totalQuestions['powerbi']) * 100, 1) }}%</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex">
                            <div class="card border-warning h-100 w-100">
                                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                    <h6 class="card-title text-warning">Power Automate</h6>
                                    <h3 class="text-warning">{{ $scores['powerautomate'] }}/{{ $totalQuestions['powerautomate'] }}</h3>
                                    <p class="mb-0">{{ number_format(($scores['powerautomate'] / $totalQuestions['powerautomate']) * 100, 1) }}%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center mb-4">
                        <h4>Puntuación Total: {{ $totalScore }}/45</h4>
                        <p class="text-muted">{{ number_format(($totalScore / 45) * 100, 1) }}% de aciertos</p>
                        <small class="text-muted d-block mt-2">Nota: La puntuación total representa el porcentaje combinado de aciertos en Excel, Power BI y Power Automate; orienta sobre tu nivel global y las áreas que podrías reforzar.</small>
                    </div>
                    
                    <div class="alert alert-info">
                        <h6>Interpretación de Resultados:</h6>
                        <ul class="mb-0">
                            <li><strong>90-100%:</strong> Excede las expectativas del conocimiento</li>
                            <li><strong>70-89%:</strong> Cumple las expectativas del conocimiento</li>
                            <li><strong>50-69%:</strong> Conocimiento básico</li>
                            <li><strong>0-49%:</strong> Necesitas mejorar tus conocimientos</li>
                        </ul>
                    </div>
                    
                    <div class="text-center mt-4 d-flex flex-wrap gap-2 justify-content-center">
                        <a href="{{ route('diagnostic.index') }}" class="btn btn-primary">Realizar Otro Diagnóstico</a>
                        <a href="{{ route('home') }}" class="btn btn-secondary">Volver al Inicio</a>
                        @if(!$isRegistered)
                        <a href="{{ route('register') }}" class="btn btn-warning fw-semibold">
                            <i class="bi bi-person-plus-fill me-1"></i>Crear Cuenta
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection