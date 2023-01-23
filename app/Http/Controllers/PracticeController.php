<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Student;
use App\Models\Subject;

class PracticeController extends Controller
{
    public function practice($student_id)
    {
        return $students = DB::table('subjects')
        ->select('subjects.subject_name')->get();
    }
}
