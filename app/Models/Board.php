<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\BoardController;
use Laravel\Sanctum\HasApiTokens;

class Board extends Model
{
    use HasFactory;
    protected $fillable =[
        'board_name',
        'student_id',
        'standard'
    ];
    public $timestamps = false;
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}