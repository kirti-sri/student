<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Chapter;

class ChapterController extends Controller
{
    public function get_chapters($subject_id)
    {
        $response = array();
        $subject = Subject::where('id',$subject_id)->first();
        $chapters = $subject->chapters();

        
        $chapters = Chapter::where('id',$id)->get();

        $response['code'] = 200;
        $response['message'] = $chapters;

        return response()->json($response);
    }
}