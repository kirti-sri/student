<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quizz extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'duration',
        'chapter_id',
    ];

    protected $hidden =[
        'correct_option'
    ];

}