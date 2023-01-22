<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'user_id',
        'total_score',
        'quizz_id',
        'time_taken', 
    ];
}
