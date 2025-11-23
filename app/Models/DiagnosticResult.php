<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiagnosticResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'excel_score',
        'powerbi_score',
        'powerautomate_score',
        'total_score',
    ];
}
