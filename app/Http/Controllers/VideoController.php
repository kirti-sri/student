<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Topic;
use App\Models\Video;

class VideoController extends Controller
{
    public function video($topic_id)
    {
        return $video = Video::where('topic_id',$topic_id)->get();
    }
}
