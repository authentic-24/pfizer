@extends('layouts.app')

@section('title', 'Authentic Learn - Diagnóstico')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-12">
            <div class="card">
                <div class="card-body text-center">
                    <h2 class="h4 fw-bold text-dark mb-3">Diagnóstico de Conocimientos</h2>
                    <p class="text-muted mb-4">Evalúa tu nivel en Excel, Power BI y Power Automate</p>
                    
                    <form method="POST" action="{{ route('diagnostic.start') }}">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="email" class="form-label fw-medium">Correo Electrónico *</label>
                            <input type="email" name="email" id="email" class="form-control" 
                                   placeholder="tu@email.com" required>
                            @error('email')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                Iniciar Diagnóstico
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection