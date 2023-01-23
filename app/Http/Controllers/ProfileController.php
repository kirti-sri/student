<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Student;
use App\Models\Board;


class ProfileController extends Controller
{
    public function profile($student_id)
    {
        return DB::table('students')
        ->select('students.student_id', 'students.name', 'boards.name','boards.standard')
    ->join('boards', 'students.student_id', '=', 'boards.id')
    ->get();
    }
}
