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
        'name',
        'standard'
    ];
    
    public $timestamps = false;
    
    public function subjects()
    {
        return $this->hasMany(Subject::class,'board_id');
    }
}