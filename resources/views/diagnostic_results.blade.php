@extends('layouts.app')

@section('title', 'Authentic Learn - Resultados del Diagnóstico')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-12">
            <div class="card">
                <div class="card-header bg-success text-white text-center">
                    <h4 class="mb-0">Resultados del Diagnóstico</h4>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <h5>Correo Electrónico: {{ $email }}</h5>
                        <p class="text-muted">Fecha: {{ now()->format('d/m/Y H:i') }}</p>
                    </div>
                    
                    <div class="row text-center mb-4">
                        <div class="col-md-4">
                            <div class="card border-primary">
                                <div class="card-body">
                                    <h6 class="card-title text-primary">Excel</h6>
                                    <h3 class="text-primary">{{ $scores['excel'] }}/{{ $totalQuestions['excel'] }}</h3>
                                    <p class="mb-0">{{ number_format(($scores['excel'] / $totalQuestions['excel']) * 100, 1) }}%</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-success">
                                <div class="card-body">
                                    <h6 class="card-title text-success">Power BI</h6>
                                    <h3 class="text-success">{{ $scores['powerbi'] }}/{{ $totalQuestions['powerbi'] }}</h3>
                                    <p class="mb-0">{{ number_format(($scores['powerbi'] / $totalQuestions['powerbi']) * 100, 1) }}%</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-warning">
                                <div class="card-body">
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
                    </div>
                    
                    <div class="alert alert-info">
                        <h6>Interpretación de Resultados:</h6>
                        <ul class="mb-0">
                            <li><strong>90-100%:</strong> Excelente conocimiento</li>
                            <li><strong>70-89%:</strong> Buen conocimiento</li>
                            <li><strong>50-69%:</strong> Conocimiento básico</li>
                            <li><strong>0-49%:</strong> Necesitas mejorar tus conocimientos</li>
                        </ul>
                    </div>
                    
                    <div class="text-center">
                        <a href="{{ route('diagnostic.index') }}" class="btn btn-primary">Realizar Otro Diagnóstico</a>
                        <a href="{{ route('home') }}" class="btn btn-secondary ms-2">Volver al Inicio</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection