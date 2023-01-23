<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Board;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function get_student_details($student_id)
    {
        $student = User::find($student_id);
      
        $subjects = Subject::where('board_id', $student->board_id)->where('standard', $student->standard)->get();
        if (!$student) {
            $response['code'] = 404;
            $response['message'] = 'No user found with the requested ID';
        } else {
            $response['code'] = 200;
            $response['data'] = [
                'student' => $student,
                'subjects' => $subjects
            ];
        }
        
        return response()->json($response);
    }

    public function onboarding_user(Request $request)
    {
        $response = array();
        $user = User::where('email', '=', $request->email)->first();

        if (!$user) {
            $response['code'] = 404;
            $response['message'] = 'no user found with the requested email';
        } else {
            if ($user->board_id == null) {
                $user->update([
                    'board_id' => $request->board_id,
                    'standard' => $request->standard
                ]);

                $response['code'] = 200;
                $response['message'] = 'Board and standard added successfully';
                $response['board_status'] = true;
            } else {
                $response['code'] = 200;
                $response['board_status'] = false;
            }
        }

        return response()->json($response);
    }
}
