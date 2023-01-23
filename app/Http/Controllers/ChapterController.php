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
        $subject = Subject::find($subject_id);
        $chapters = $subject->chapters()->get();

        $response['code'] = 200;
        $response['message'] = $chapters;

        return response()->json($response);
    }
}