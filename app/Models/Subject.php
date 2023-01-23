<?php

use App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable =[
        'standard',
        'name',
        'board_id'
    ];
    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
}
