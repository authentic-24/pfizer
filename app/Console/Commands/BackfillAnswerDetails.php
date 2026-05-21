<?php

namespace App\Console\Commands;

use App\Models\DiagnosticQuestion;
use App\Models\DiagnosticResult;
use Illuminate\Console\Command;

class BackfillAnswerDetails extends Command
{
    protected $signature   = 'diagnostic:backfill-answers {--force : Reprocesar registros ya reconstruidos}';
    protected $description = 'Rellena answer_details con distribucion aleatoria por persona';

    private array $special = [
        'diana.rodriguez.montenegro@correonivalle.edu.co' => [
            'answered' => 16,
            'correct'  => 12,
        ],
    ];

    public function handle(): int
    {
        $questions = DiagnosticQuestion::orderBy('id')->get()->values();
        $total     = $questions->count();

        $records = DiagnosticResult::all()->filter(function ($r) {
            $details = $r->answer_details;
            if (empty($details)) return true;
            if ($this->option('force')) return true;
            return collect($details)->contains(fn($a) => $a['reconstructed'] ?? false);
        });

        if ($records->isEmpty()) {
            $this->info('No hay registros que procesar.');
            return self::SUCCESS;
        }

        $this->info("Procesando {$records->count()} registro(s)...");
        $bar = $this->output->createProgressBar($records->count());
        $bar->start();

        foreach ($records as $result) {
            $email   = strtolower(trim($result->email));
            $special = $this->special[$email] ?? null;

            $answered = $special ? $special['answered'] : $total;
            $correct  = $special ? $special['correct']  : $result->excel_score;

            // Semilla determinista: misma persona siempre produce la misma distribucion
            srand(crc32($email . $result->id));

            // Si tuvo mas de 9 correctas, las primeras 8 (Principiante) siempre correctas
            if ($correct > 9 && $answered >= 8) {
                $fixedCorrect  = range(0, 7);                          // indices 0-7 siempre bien
                $remaining     = $correct - 8;                         // cuantas mas hay que distribuir
                $restIndices   = range(8, $answered - 1);              // indices disponibles
                $randomCorrect = $this->randomPick($restIndices, $remaining);
                $correctSet    = array_merge($fixedCorrect, $randomCorrect);
            } else {
                $answeredIndices = range(0, $answered - 1);
                $correctSet      = $this->randomPick($answeredIndices, $correct);
            }

            $details = [];
            foreach ($questions as $idx => $q) {
                $correctKey = $q->correct_answer;
                $options    = [
                    'a' => $q->option_a,
                    'b' => $q->option_b,
                    'c' => $q->option_c,
                    'd' => $q->option_d,
                ];

                if ($idx >= $answered) {
                    $details[] = [
                        'number'         => $idx + 1,
                        'question'       => $q->question,
                        'user_answer'    => null,
                        'correct_answer' => $correctKey,
                        'is_correct'     => false,
                        'options'        => $options,
                        'reconstructed'  => true,
                        'not_answered'   => true,
                    ];
                } else {
                    $isCorrect  = in_array($idx, $correctSet);
                    $wrongKeys  = array_values(array_filter(['a', 'b', 'c', 'd'], fn($k) => $k !== $correctKey));
                    $userAnswer = $isCorrect ? $correctKey : $wrongKeys[array_rand($wrongKeys)];

                    $details[] = [
                        'number'         => $idx + 1,
                        'question'       => $q->question,
                        'user_answer'    => $userAnswer,
                        'correct_answer' => $correctKey,
                        'is_correct'     => $isCorrect,
                        'options'        => $options,
                        'reconstructed'  => true,
                        'not_answered'   => false,
                    ];
                }
            }

            srand();

            $result->answer_details = $details;
            $result->save();
            $bar->advance();
        }

        $bar->finish();
        $this->newLine();
        $this->info('Completado.');

        return self::SUCCESS;
    }

    private function randomPick(array $pool, int $n): array
    {
        shuffle($pool);
        return array_slice($pool, 0, min($n, count($pool)));
    }
}
