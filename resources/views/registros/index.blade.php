@extends('layouts.app')

@section('title', 'Registros de Diagnóstico')

@section('content')
<div class="container-fluid py-5 px-4 px-md-5">

    {{-- Encabezado --}}
    <div class="d-flex flex-wrap align-items-center justify-content-between mb-4 gap-3">
        <div>
            <h2 class="fw-bold mb-1" style="color:#1a3a5c;">
                <i class="bi bi-clipboard2-data me-2" style="color:#0057a8;"></i>
                Registros de Diagnóstico
            </h2>
            <p class="text-muted mb-0" style="font-size:.95rem;">
                Resultados individuales por enfermera — Proyecto Pfizer
            </p>
        </div>
        <a href="{{ route('registros.download-all') }}"
           class="btn btn-success d-flex align-items-center gap-2 px-4 py-2"
           style="border-radius:10px; font-weight:600;">
            <i class="bi bi-file-earmark-excel-fill"></i>
            Descargar todos (Excel)
        </a>
    </div>

    {{-- Contador --}}
    <div class="mb-4">
        <span class="badge bg-primary fs-6 px-3 py-2">
            {{ $results->count() }} {{ $results->count() === 1 ? 'registro' : 'registros' }} encontrado{{ $results->count() === 1 ? '' : 's' }}
        </span>
    </div>

    @if($results->isEmpty())
        <div class="alert alert-info d-flex align-items-center gap-2" role="alert">
            <i class="bi bi-info-circle-fill fs-5"></i>
            <span>Aún no hay diagnósticos registrados.</span>
        </div>
    @else
        {{-- Tabla principal --}}
        <div class="card shadow-sm border-0" style="border-radius:14px; overflow:hidden;">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead style="background:#0057a8; color:#fff;">
                        <tr>
                            <th class="px-4 py-3" style="min-width:200px;">Nombre Completo</th>
                            <th class="px-3 py-3" style="min-width:220px;">Correo electrónico</th>
                            <th class="px-3 py-3" style="min-width:180px;">Institución</th>
                            <th class="px-3 py-3 text-center" style="min-width:120px;">Puntaje Excel</th>
                            <th class="px-3 py-3 text-center" style="min-width:130px;">Nivel</th>
                            <th class="px-3 py-3 text-center" style="min-width:140px;">Fecha</th>
                            <th class="px-4 py-3 text-center" style="min-width:140px;">Descargable</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($results as $row)
                        <tr>
                            {{-- Nombre completo + cargo --}}
                            <td class="px-4 py-3">
                                <div class="fw-semibold" style="color:#1a3a5c;">
                                    {{ $row['nombre'] }} {{ $row['apellido'] }}
                                </div>
                                @if($row['cargo'] !== '—')
                                    <small class="text-muted">{{ $row['cargo'] }}</small>
                                @endif
                            </td>

                            {{-- Correo --}}
                            <td class="px-3 py-3">
                                <a href="mailto:{{ $row['email'] }}" class="text-decoration-none text-dark">
                                    {{ $row['email'] }}
                                </a>
                            </td>

                            {{-- Institución --}}
                            <td class="px-3 py-3">{{ $row['institucion'] }}</td>

                            {{-- Puntaje --}}
                            <td class="px-3 py-3 text-center">
                                <span class="fw-bold fs-5" style="color:#0057a8;">{{ $row['excel_score'] }}</span>
                            </td>

                            {{-- Nivel --}}
                            <td class="px-3 py-3 text-center">
                                @php
                                    $badgeClass = match($row['nivel']) {
                                        'Avanzado'    => 'bg-success',
                                        'Intermedio'  => 'bg-warning text-dark',
                                        default       => 'bg-secondary',
                                    };
                                @endphp
                                <span class="badge {{ $badgeClass }} px-3 py-2 fs-6">
                                    {{ $row['nivel'] }}
                                </span>
                            </td>

                            {{-- Fecha --}}
                            <td class="px-3 py-3 text-center text-muted" style="font-size:.88rem;">
                                {{ $row['fecha'] }}
                            </td>

                            {{-- Botón descarga --}}
                            <td class="px-4 py-3 text-center">
                                <a href="{{ route('registros.download', $row['id']) }}"
                                   class="btn btn-sm btn-outline-success d-inline-flex align-items-center gap-1 px-3"
                                   style="border-radius:8px; font-weight:600;"
                                   title="Descargar diagnóstico de {{ $row['nombre'] }} {{ $row['apellido'] }}">
                                    <i class="bi bi-file-earmark-excel-fill"></i>
                                    .xlsx
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Leyenda de niveles --}}
        <div class="d-flex flex-wrap gap-3 mt-4">
            <span class="d-flex align-items-center gap-2 text-muted" style="font-size:.88rem;">
                <span class="badge bg-secondary px-2">Principiante</span> 0 – 9 puntos
            </span>
            <span class="d-flex align-items-center gap-2 text-muted" style="font-size:.88rem;">
                <span class="badge bg-warning text-dark px-2">Intermedio</span> 10 – 18 puntos
            </span>
            <span class="d-flex align-items-center gap-2 text-muted" style="font-size:.88rem;">
                <span class="badge bg-success px-2">Avanzado</span> 19+ puntos
            </span>
        </div>
    @endif
</div>
@endsection
