<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiagnosticQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'question',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'correct_answer',
    ];
}
