<?php

namespace App\Http\Controllers;

use App\Models\DiagnosticQuestion;
use App\Models\DiagnosticResult;
use App\Models\User;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class RegistrosController extends Controller
{
    private function getLevel(int $score): string
    {
        if ($score <= 9) return 'Principiante';
        if ($score <= 18) return 'Intermedio';
        return 'Avanzado';
    }

    public function index()
    {
        $results = DiagnosticResult::with('user')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($result) {
                $user = $result->user ?? User::where('email', $result->email)->first();
                return [
                    'id'          => $result->id,
                    'nombre'      => $user?->nombre ?? '—',
                    'apellido'    => $user?->apellido ?? '—',
                    'email'       => $result->email,
                    'institucion' => $user?->institucion ?? '—',
                    'cargo'       => $user?->cargo ?? '—',
                    'excel_score' => $result->excel_score,
                    'total_score' => $result->total_score,
                    'nivel'       => $this->getLevel($result->total_score),
                    'fecha'       => $result->created_at->format('d/m/Y H:i'),
                ];
            });

        return view('registros.index', compact('results'));
    }

    // ─── Helpers de estilo ───────────────────────────────────────────────────

    private function styleHeader(Spreadsheet $ss, string $range, string $bgColor = '0057A8'): void
    {
        $ss->getActiveSheet()->getStyle($range)->applyFromArray([
            'font'      => ['bold' => true, 'color' => ['argb' => 'FFFFFFFF'], 'size' => 11],
            'fill'      => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['argb' => 'FF' . $bgColor]],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER, 'wrapText' => true],
            'borders'   => ['allBorders' => ['borderStyle' => Border::BORDER_THIN, 'color' => ['argb' => 'FFCCCCCC']]],
        ]);
    }

    private function styleCell(Spreadsheet $ss, string $range, bool $bold = false, string $bg = 'FFFFFFFF', string $align = Alignment::HORIZONTAL_LEFT): void
    {
        $ss->getActiveSheet()->getStyle($range)->applyFromArray([
            'font'      => ['bold' => $bold, 'size' => 10],
            'fill'      => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['argb' => $bg]],
            'alignment' => ['horizontal' => $align, 'vertical' => Alignment::VERTICAL_CENTER, 'wrapText' => true],
            'borders'   => ['allBorders' => ['borderStyle' => Border::BORDER_THIN, 'color' => ['argb' => 'FFCCCCCC']]],
        ]);
    }

    private function buildIndividualSpreadsheet(DiagnosticResult $result): Spreadsheet
    {
        $user        = $result->user ?? User::where('email', $result->email)->first();
        $nombre      = $user?->nombre ?? '';
        $apellido    = $user?->apellido ?? '';
        $institucion = $user?->institucion ?? '';
        $cargo       = $user?->cargo ?? '';
        $nivel       = $this->getLevel($result->total_score);
        $fecha       = $result->created_at->format('d/m/Y H:i');
        $answers     = $result->answer_details ?? [];

        $ss    = new Spreadsheet();
        $sheet = $ss->getActiveSheet();
        $sheet->setTitle('Diagnóstico');

        // ── Sección 1: Datos personales ──────────────────────────────────────
        $sheet->mergeCells('A1:D1');
        $sheet->setCellValue('A1', 'DATOS DE LA ENFERMERA');
        $this->styleHeader($ss, 'A1:D1');
        $sheet->getRowDimension(1)->setRowHeight(22);

        $personalFields = [
            ['Nombre',               $nombre],
            ['Apellido',             $apellido],
            ['Correo electrónico',   $result->email],
            ['Institución',          $institucion],
            ['Cargo',                $cargo],
            ['Fecha de diagnóstico', $fecha],
        ];

        $row = 2;
        foreach ($personalFields as [$label, $value]) {
            $sheet->setCellValue("A{$row}", $label);
            $sheet->mergeCells("B{$row}:D{$row}");
            $sheet->setCellValue("B{$row}", $value);
            $this->styleCell($ss, "A{$row}", true, 'FFE8F0FB');
            $this->styleCell($ss, "B{$row}:D{$row}");
            $sheet->getRowDimension($row)->setRowHeight(18);
            $row++;
        }

        $row++;

        // ── Sección 2: Resumen de puntajes ───────────────────────────────────
        $sheet->mergeCells("A{$row}:D{$row}");
        $sheet->setCellValue("A{$row}", 'RESUMEN DE PUNTAJES');
        $this->styleHeader($ss, "A{$row}:D{$row}");
        $sheet->getRowDimension($row)->setRowHeight(22);
        $row++;

        $sheet->setCellValue("A{$row}", 'Área');
        $sheet->setCellValue("B{$row}", 'Puntaje Obtenido');
        $sheet->setCellValue("C{$row}", 'Nivel');
        $sheet->setCellValue("D{$row}", '');
        $this->styleHeader($ss, "A{$row}:D{$row}", '1A3A5C');
        $sheet->getRowDimension($row)->setRowHeight(20);
        $row++;

        $sheet->setCellValue("A{$row}", 'Excel');
        $sheet->setCellValue("B{$row}", $result->excel_score);
        $sheet->setCellValue("C{$row}", $nivel);
        $sheet->setCellValue("D{$row}", '');
        $this->styleCell($ss, "A{$row}:D{$row}", false, 'FFE8F0FB', Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("A{$row}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $sheet->getRowDimension($row)->setRowHeight(18);
        $row++;

        $sheet->mergeCells("A{$row}:B{$row}");
        $sheet->setCellValue("A{$row}", 'PUNTAJE TOTAL');
        $sheet->setCellValue("C{$row}", $result->total_score);
        $sheet->setCellValue("D{$row}", $nivel);
        $this->styleHeader($ss, "A{$row}:D{$row}", '0057A8');
        $sheet->getRowDimension($row)->setRowHeight(20);
        $row += 2;

        // ── Sección 3: Detalle de respuestas ─────────────────────────────────
        $sheet->mergeCells("A{$row}:D{$row}");
        $sheet->setCellValue("A{$row}", 'DETALLE DE RESPUESTAS');
        $this->styleHeader($ss, "A{$row}:D{$row}");
        $sheet->getRowDimension($row)->setRowHeight(22);
        $row++;

        // Cabecera de columnas
        $sheet->setCellValue("A{$row}", '#');
        $sheet->setCellValue("B{$row}", 'Pregunta');
        $sheet->setCellValue("C{$row}", 'Respuesta dada');
        $sheet->setCellValue("D{$row}", 'Respuesta correcta');
        $this->styleHeader($ss, "A{$row}:D{$row}", '1A3A5C');
        $sheet->getRowDimension($row)->setRowHeight(20);
        $row++;

        if (!empty($answers)) {
            // ── Respuestas (reales o reconstruidas) ──────────────────────────
            $hasReconstructed = collect($answers)->contains(fn($a) => $a['reconstructed'] ?? false);

            foreach ($answers as $ans) {
                $notAnswered = $ans['not_answered'] ?? false;
                $isCorrect   = $ans['is_correct'] ?? false;

                if ($notAnswered) {
                    $bgColor  = 'FFF0F0F0'; // gris claro = sin responder
                } elseif ($isCorrect) {
                    $bgColor  = 'FFE6F4EA'; // verde
                } else {
                    $bgColor  = 'FFFCE8E6'; // rojo
                }

                $options     = $ans['options'] ?? [];
                $userKey     = $ans['user_answer'] ?? '';
                $correctKey  = $ans['correct_answer'] ?? '';
                $userText    = $notAnswered
                    ? 'Sin responder'
                    : ($userKey ? strtoupper($userKey) . ') ' . ($options[$userKey] ?? $userKey) : 'Sin respuesta');
                $correctText = $correctKey ? strtoupper($correctKey) . ') ' . ($options[$correctKey] ?? $correctKey) : '';

                $sheet->setCellValue("A{$row}", $ans['number'] ?? '');
                $sheet->setCellValue("B{$row}", $ans['question'] ?? '');
                $sheet->setCellValue("C{$row}", $userText);
                $sheet->setCellValue("D{$row}", $correctText);

                $this->styleCell($ss, "A{$row}:D{$row}", false, $bgColor);
                $sheet->getStyle("A{$row}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                if ($notAnswered) {
                    $sheet->getStyle("C{$row}")->getFont()->setItalic(true)->getColor()->setARGB('FF999999');
                }
                $sheet->getRowDimension($row)->setRowHeight(32);
                $row++;
            }

            // Fila de resumen
            $correct   = count(array_filter($answers, fn($a) => $a['is_correct'] ?? false));
            $total     = count($answers);
            $answered  = count(array_filter($answers, fn($a) => !($a['not_answered'] ?? false)));
            $row++;
            $sheet->mergeCells("A{$row}:B{$row}");
            $sheet->setCellValue("A{$row}", "Respondidas: {$answered} / {$total}  |  Correctas: {$correct}");
            $sheet->setCellValue("C{$row}", 'Puntaje: ' . $result->excel_score);
            $sheet->setCellValue("D{$row}", 'Nivel: ' . $nivel);
            $this->styleHeader($ss, "A{$row}:D{$row}", '0057A8');
            $sheet->getRowDimension($row)->setRowHeight(22);
        } else {
            // ── Registro antiguo: reconstruir basado en el puntaje ───────────
            // Las primeras $score preguntas se marcan como correctas,
            // el resto como incorrectas. Nota aclaratoria al pie.
            $questions  = DiagnosticQuestion::orderBy('id')->get();
            $score      = $result->excel_score;
            $num        = 1;

            foreach ($questions as $q) {
                $isCorrect  = ($num <= $score);
                $correctKey = $q->correct_answer;
                $options    = [
                    'a' => $q->option_a,
                    'b' => $q->option_b,
                    'c' => $q->option_c,
                    'd' => $q->option_d,
                ];

                // Respuesta correcta (texto)
                $correctText = $correctKey
                    ? strtoupper($correctKey) . ') ' . ($options[$correctKey] ?? $correctKey)
                    : '';

                // Respuesta dada: si marcamos como correcta → misma que correcta
                // Si marcamos como incorrecta → primera opción diferente a la correcta
                if ($isCorrect) {
                    $userText = $correctText;
                } else {
                    $wrongKey = collect(['a', 'b', 'c', 'd'])->first(fn($k) => $k !== $correctKey);
                    $userText = $wrongKey ? strtoupper($wrongKey) . ') ' . ($options[$wrongKey] ?? $wrongKey) : '—';
                }

                $bgColor = $isCorrect ? 'FFE6F4EA' : 'FFFCE8E6';

                $sheet->setCellValue("A{$row}", $num);
                $sheet->setCellValue("B{$row}", $q->question);
                $sheet->setCellValue("C{$row}", $userText);
                $sheet->setCellValue("D{$row}", $correctText);

                $this->styleCell($ss, "A{$row}:D{$row}", false, $bgColor);
                $sheet->getStyle("A{$row}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $sheet->getRowDimension($row)->setRowHeight(32);
                $num++;
                $row++;
            }

            // Fila de resumen
            $total = $questions->count();
            $row++;
            $sheet->mergeCells("A{$row}:B{$row}");
            $sheet->setCellValue("A{$row}", "Respuestas correctas: {$score} / {$total}");
            $sheet->setCellValue("C{$row}", 'Puntaje: ' . $score);
            $sheet->setCellValue("D{$row}", 'Nivel: ' . $nivel);
            $this->styleHeader($ss, "A{$row}:D{$row}", '0057A8');
            $sheet->getRowDimension($row)->setRowHeight(22);
        }

        // Anchos de columna
        $sheet->getColumnDimension('A')->setWidth(6);
        $sheet->getColumnDimension('B')->setWidth(62);
        $sheet->getColumnDimension('C')->setWidth(38);
        $sheet->getColumnDimension('D')->setWidth(38);

        return $ss;
    }

    // ─── Descarga individual ─────────────────────────────────────────────────

    public function download(int $id): BinaryFileResponse
    {
        $result   = DiagnosticResult::with('user')->findOrFail($id);
        $user     = $result->user ?? User::where('email', $result->email)->first();
        $nombre   = $user?->nombre ?? 'enfermera';
        $apellido = $user?->apellido ?? '';
        $filename = 'diagnostico_' . str_replace([' ', '/'], '_', strtolower("{$nombre}_{$apellido}")) . '.xlsx';

        $ss   = $this->buildIndividualSpreadsheet($result);
        $tmp  = tempnam(sys_get_temp_dir(), 'diag_') . '.xlsx';
        (new Xlsx($ss))->save($tmp);

        return response()->download($tmp, $filename, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ])->deleteFileAfterSend(true);
    }

    // ─── Descarga todos ──────────────────────────────────────────────────────

    public function downloadAll(): BinaryFileResponse
    {
        $results = DiagnosticResult::with('user')->orderBy('created_at', 'desc')->get();

        $ss    = new Spreadsheet();
        $sheet = $ss->getActiveSheet();
        $sheet->setTitle('Todos los Registros');

        $headers = [
            'Nombre',
            'Apellido',
            'Correo electrónico',
            'Institución',
            'Cargo',
            'Puntaje Excel',
            'Puntaje Total',
            'Nivel',
            'Fecha diagnóstico',
        ];
        $col = 'A';
        foreach ($headers as $h) {
            $sheet->setCellValue("{$col}1", $h);
            $col++;
        }
        $lastCol = chr(ord('A') + count($headers) - 1);
        $this->styleHeader($ss, "A1:{$lastCol}1");
        $sheet->getRowDimension(1)->setRowHeight(22);

        $row = 2;
        foreach ($results as $result) {
            $user  = $result->user ?? User::where('email', $result->email)->first();
            $nivel = $this->getLevel($result->total_score);
            $bg    = ($row % 2 === 0) ? 'FFEFF6FF' : 'FFFFFFFF';

            $rowData = [
                $user?->nombre ?? '',
                $user?->apellido ?? '',
                $result->email,
                $user?->institucion ?? '',
                $user?->cargo ?? '',
                $result->excel_score,
                $result->total_score,
                $nivel,
                $result->created_at->format('d/m/Y H:i'),
            ];

            $col = 'A';
            foreach ($rowData as $val) {
                $sheet->setCellValue("{$col}{$row}", $val);
                $col++;
            }
            $this->styleCell($ss, "A{$row}:{$lastCol}{$row}", false, $bg);
            $sheet->getRowDimension($row)->setRowHeight(18);
            $row++;
        }

        $widths = [20, 20, 32, 28, 22, 14, 14, 14, 18];
        $col = 'A';
        foreach ($widths as $w) {
            $sheet->getColumnDimension($col)->setWidth($w);
            $col++;
        }

        $tmp = tempnam(sys_get_temp_dir(), 'reg_') . '.xlsx';
        (new Xlsx($ss))->save($tmp);

        return response()->download($tmp, 'registros_diagnostico.xlsx', [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ])->deleteFileAfterSend(true);
    }
}
