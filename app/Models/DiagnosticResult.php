<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiagnosticResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'email',
        'excel_score',
        'powerbi_score',
        'powerautomate_score',
        'total_score',
        'answer_details',
    ];

    protected $casts = [
        'answer_details' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
