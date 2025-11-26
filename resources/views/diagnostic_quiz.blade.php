@extends('layouts.app')

@section('title', 'Authentic Learn - Diagnóstico')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-12">
            <div class="text-center mb-4">
                <h2 class="h4 fw-bold text-dark mb-2">Diagnóstico de Conocimientos</h2>
                <p class="text-muted small">Responde las siguientes preguntas para evaluar tu nivel en Excel, Power BI y Power Automate</p>
                <div class="alert alert-warning" id="timerAlert">
                    <strong>Tiempo restante: <span id="timer">45:00</span></strong>
                </div>
            </div>
            
            <form method="POST" action="{{ route('diagnostic.submit') }}" id="diagnosticForm">
                @csrf
                
                @php $questionNumber = 1; @endphp
                
                @if(isset($questions['excel']))
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Excel</h5>
                    </div>
                    <div class="card-body">
                        @foreach($questions['excel'] as $question)
                        <div class="mb-4">
                            <p class="fw-medium">{{ $questionNumber }}. {{ $question->question }}</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="question_{{ $question->id }}" id="q{{ $question->id }}_a" value="a" required>
                                <label class="form-check-label" for="q{{ $question->id }}_a">
                                    a) {{ $question->option_a }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="question_{{ $question->id }}" id="q{{ $question->id }}_b" value="b">
                                <label class="form-check-label" for="q{{ $question->id }}_b">
                                    b) {{ $question->option_b }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="question_{{ $question->id }}" id="q{{ $question->id }}_c" value="c">
                                <label class="form-check-label" for="q{{ $question->id }}_c">
                                    c) {{ $question->option_c }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="question_{{ $question->id }}" id="q{{ $question->id }}_d" value="d">
                                <label class="form-check-label" for="q{{ $question->id }}_d">
                                    d) {{ $question->option_d }}
                                </label>
                            </div>
                        </div>
                        @php $questionNumber++; @endphp
                        @endforeach
                    </div>
                </div>
                @endif
                
                @if(isset($questions['powerbi']))
                <div class="card mb-4">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">Power BI</h5>
                    </div>
                    <div class="card-body">
                        @foreach($questions['powerbi'] as $question)
                        <div class="mb-4">
                            <p class="fw-medium">{{ $questionNumber }}. {{ $question->question }}</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="question_{{ $question->id }}" id="q{{ $question->id }}_a" value="a" required>
                                <label class="form-check-label" for="q{{ $question->id }}_a">
                                    a) {{ $question->option_a }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="question_{{ $question->id }}" id="q{{ $question->id }}_b" value="b">
                                <label class="form-check-label" for="q{{ $question->id }}_b">
                                    b) {{ $question->option_b }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="question_{{ $question->id }}" id="q{{ $question->id }}_c" value="c">
                                <label class="form-check-label" for="q{{ $question->id }}_c">
                                    c) {{ $question->option_c }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="question_{{ $question->id }}" id="q{{ $question->id }}_d" value="d">
                                <label class="form-check-label" for="q{{ $question->id }}_d">
                                    d) {{ $question->option_d }}
                                </label>
                            </div>
                        </div>
                        @php $questionNumber++; @endphp
                        @endforeach
                    </div>
                </div>
                @endif
                
                @if(isset($questions['powerautomate']))
                <div class="card mb-4">
                    <div class="card-header bg-warning">
                        <h5 class="mb-0">Power Automate</h5>
                    </div>
                    <div class="card-body">
                        @foreach($questions['powerautomate'] as $question)
                        <div class="mb-4">
                            <p class="fw-medium">{{ $questionNumber }}. {{ $question->question }}</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="question_{{ $question->id }}" id="q{{ $question->id }}_a" value="a" required>
                                <label class="form-check-label" for="q{{ $question->id }}_a">
                                    a) {{ $question->option_a }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="question_{{ $question->id }}" id="q{{ $question->id }}_b" value="b">
                                <label class="form-check-label" for="q{{ $question->id }}_b">
                                    b) {{ $question->option_b }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="question_{{ $question->id }}" id="q{{ $question->id }}_c" value="c">
                                <label class="form-check-label" for="q{{ $question->id }}_c">
                                    c) {{ $question->option_c }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="question_{{ $question->id }}" id="q{{ $question->id }}_d" value="d">
                                <label class="form-check-label" for="q{{ $question->id }}_d">
                                    d) {{ $question->option_d }}
                                </label>
                            </div>
                        </div>
                        @php $questionNumber++; @endphp
                        @endforeach
                    </div>
                </div>
                @endif
                
                <div class="card">
                    <div class="card-body">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                Enviar Diagnóstico
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// Prevent back navigation
history.pushState(null, null, location.href);
window.onpopstate = function () {
    history.go(1);
};

// Timer functionality
let timeLeft = 45 * 60; // 45 minutes in seconds
const timerElement = document.getElementById('timer');

function updateTimer() {
    const minutes = Math.floor(timeLeft / 60);
    const seconds = timeLeft % 60;
    timerElement.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
    
    const timerAlert = document.getElementById('timerAlert');
    if (timeLeft <= 300) { // 5 minutes
        timerAlert.className = 'alert alert-danger';
    }
    
    if (timeLeft <= 0) {
        // Time's up, mark as submitting and submit the form
        isSubmitting = true;
        const form = document.getElementById('diagnosticForm');
        if (form) form.submit();
    } else {
        timeLeft--;
        setTimeout(updateTimer, 1000);
    }
}

// Start the timer
updateTimer();

// Warn when trying to leave the page, but don't show prompt when the form is submitting
let isSubmitting = false;

function beforeUnloadHandler(e) {
    if (isSubmitting) return;
    e.preventDefault();
    e.returnValue = '¿Estás seguro de que quieres salir? El diagnóstico se perderá.';
}

window.addEventListener('beforeunload', beforeUnloadHandler);

const diagnosticFormEl = document.getElementById('diagnosticForm');
if (diagnosticFormEl) {
    diagnosticFormEl.addEventListener('submit', function () {
        // mark as submitting and remove the handler so the browser won't show the confirmation
        isSubmitting = true;
        window.removeEventListener('beforeunload', beforeUnloadHandler);
    });
}
</script>

@endsection