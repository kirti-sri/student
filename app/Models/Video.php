<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $fillable =[
        'video_id',
        'topic_id',
        'video'
    ];
    protected $primaryKey = 'video_id';
}
