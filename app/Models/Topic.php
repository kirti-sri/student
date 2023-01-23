<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
    protected $fillable =[
        'chap_id',
        'name'
    ];
    
    public function note()
    {
        return $this->belongsToMany(Note::class);
    }
    public function video()
    {
        return $this->belongsToMany(Video::class);
    }
}