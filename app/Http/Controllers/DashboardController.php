<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Board;

class DashboardController extends Controller
{
    public function show($student_id)
    {
        return DB::table('students')
        ->select('students.student_id', 'students.name', 'boards.board_name', 'boards.standard', 'subjects.subject_name')
    ->join('boards', 'students.student_id', '=', ' boards.student_id')
    ->join('subjects','boards.standard','=','subjects.standard')
    ->get();
    }
}
