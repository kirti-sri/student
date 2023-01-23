<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;

class ProfileController extends Controller
{
    public function profile($student_id)
    {
        $student = User::find($student_id);
      

        if (!$student) {
            $response['code'] = 404;
            $response['message'] = 'No user found with the requested ID';
        } else {
            $response['code'] = 200;
            $response['data'] = [
                'student' => $student,
                'subjects' => $student->board
            ];
        }
        return response()->json($response);
    }
}
