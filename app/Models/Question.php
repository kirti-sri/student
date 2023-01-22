<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'quizz_id',
        'description',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'correct_option',
    ];
}
// Illuminate\Database\QueryException: SQLSTATE[HY000]: General error: 1364 Field 'option_d' doesn't have a default value (SQL: insert into `questions` (`quizz_id`, `description`, `option_a`, `option_b`, `option_c`, `correct_option`, `updated_at`, `created_at`) values (1, what is 1, 2, 1, 3, option_a, 2023-01-19 13:26:39, 2023-01-19 13:26:39)) in file C:\laragon\www\student\vendor\laravel\framework\src\Illuminate\Database\Connection.php on line 760
