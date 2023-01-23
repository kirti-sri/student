<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Student;
use App\Models\Chapter;

class Practice_chapterController extends Controller
{
    public function chap($student_id)
    {
        return $students = DB::table('chapters')
        ->select('chapters.chap_name')->get();
    }
}
