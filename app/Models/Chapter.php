<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    protected $fillable =[
        'subject_id',
        'name'
    ];
    
    public function topic()
    {
        return $this->belongsToMany(Topic::class);
    }
}