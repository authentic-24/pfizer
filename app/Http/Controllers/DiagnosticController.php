<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiagnosticQuestion;
use App\Models\DiagnosticResult;
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

        Session::put('diagnostic_email', $request->email);
        Session::put('quiz_started', true);
        Session::put('quiz_start_time', now());

        return redirect()->route('diagnostic.quiz');
    }

    public function quiz()
    {
        if (!Session::has('diagnostic_email') || !Session::has('quiz_started')) {
            return redirect()->route('diagnostic.index');
        }

        $questions = DiagnosticQuestion::all()->groupBy('category');
        return view('diagnostic_quiz', compact('questions'));
    }

    public function submit(Request $request)
    {
        if (!Session::has('diagnostic_email')) {
            return redirect()->route('diagnostic.index');
        }

        $email = Session::get('diagnostic_email');
        $questions = DiagnosticQuestion::all();

        $scores = [
            'excel' => 0,
            'powerbi' => 0,
            'powerautomate' => 0,
        ];

        $totalQuestions = [
            'excel' => 0,
            'powerbi' => 0,
            'powerautomate' => 0,
        ];

        foreach ($questions as $question) {
            $totalQuestions[$question->category]++;
            $answer = $request->input('question_' . $question->id);
            if ($answer === $question->correct_answer) {
                $scores[$question->category]++;
            }
        }

        $totalScore = $scores['excel'] + $scores['powerbi'] + $scores['powerautomate'];

        DiagnosticResult::create([
            'email' => $email,
            'excel_score' => $scores['excel'],
            'powerbi_score' => $scores['powerbi'],
            'powerautomate_score' => $scores['powerautomate'],
            'total_score' => $totalScore,
        ]);

        Session::forget(['diagnostic_email', 'quiz_started', 'quiz_start_time']);

        return view('diagnostic_results', compact('scores', 'totalQuestions', 'totalScore', 'email'));
    }
}
