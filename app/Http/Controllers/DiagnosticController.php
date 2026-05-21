<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiagnosticQuestion;
use App\Models\DiagnosticResult;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class DiagnosticController extends Controller
{
    public function index()
    {
        return view('diagnostic');
    }

    public function start(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = mb_strtolower(trim($request->email));

        if (DiagnosticResult::where('email', $email)->exists()) {
            return back()
                ->withErrors(['email' => 'Este correo ya realizo el diagnostico.'])
                ->withInput();
        }

        Session::put('diagnostic_email', $email);
        Session::put('quiz_started', true);
        Session::put('quiz_start_time', now());
        Session::forget('quiz_option_order');

        return redirect()->route('diagnostic.quiz');
    }

    public function quiz()
    {
        if (!Session::has('diagnostic_email') || !Session::has('quiz_started')) {
            return redirect()->route('diagnostic.index');
        }

        $excelQuestions = DiagnosticQuestion::where('category', 'excel')->orderBy('id')->get();

        $optionOrder = Session::get('quiz_option_order', []);
        foreach ($excelQuestions as $question) {
            if (!isset($optionOrder[$question->id])) {
                $keys = ['a', 'b', 'c', 'd'];
                shuffle($keys);
                $optionOrder[$question->id] = $keys;
            }
        }
        Session::put('quiz_option_order', $optionOrder);

        return view('diagnostic_quiz', compact('excelQuestions', 'optionOrder'));
    }

    public function submit(Request $request)
    {
        if (!Session::has('diagnostic_email')) {
            return redirect()->route('diagnostic.index');
        }

        $email = Session::get('diagnostic_email');

        if (DiagnosticResult::where('email', $email)->exists()) {
            Session::forget(['diagnostic_email', 'quiz_started', 'quiz_start_time', 'quiz_option_order']);

            return redirect()->route('diagnostic.index')
                ->withErrors(['email' => 'Este correo ya realizo el diagnostico.'])
                ->withInput();
        }

        $questions = DiagnosticQuestion::where('category', 'excel')->orderBy('id')->get();
        $answerDetails = [];

        $scores = [
            'excel' => 0,
        ];

        $totalQuestions = [
            'excel' => $questions->count(),
        ];

        foreach ($questions as $index => $question) {
            $answer = $request->input('question_' . $question->id);
            $isCorrect = $answer === $question->correct_answer;

            if ($isCorrect) {
                $scores['excel']++;
            }

            $answerDetails[] = [
                'number' => $index + 1,
                'question' => $question->question,
                'user_answer' => $answer,
                'correct_answer' => $question->correct_answer,
                'is_correct' => $isCorrect,
                'options' => [
                    'a' => $question->option_a,
                    'b' => $question->option_b,
                    'c' => $question->option_c,
                    'd' => $question->option_d,
                ],
            ];
        }

        $totalScore = $scores['excel'];

        if ($totalScore <= 9) {
            $excelLevel = 'Principiante';
        } elseif ($totalScore <= 18) {
            $excelLevel = 'Intermedio';
        } else {
            $excelLevel = 'Avanzado';
        }

        // Check if the email belongs to a registered user
        $user = User::where('email', $email)->first();

        $result = DiagnosticResult::create([
            'user_id'             => $user?->id,
            'email'               => $email,
            'excel_score'         => $scores['excel'],
            'powerbi_score'       => 0,
            'powerautomate_score' => 0,
            'total_score'         => $totalScore,
            'answer_details'      => $answerDetails,
        ]);

        Session::forget(['diagnostic_email', 'quiz_started', 'quiz_start_time', 'quiz_option_order']);

        // If the user is not registered, keep the result ID in session so it can be
        // linked when they register afterwards.
        if (!$user) {
            Session::put('pending_diagnostic_result_id', $result->id);
            Session::put('pending_diagnostic_email', $email);
        }

        $isRegistered = (bool) $user;

        return view('diagnostic_results', compact('scores', 'totalQuestions', 'totalScore', 'email', 'isRegistered', 'excelLevel', 'answerDetails'));
    }
}
