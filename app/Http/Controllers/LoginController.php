<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request) {
        $fields = $request->validate([
            'number' => 'required|string',
            'otp' => 'required|string'
        ]);
        
        $student = Student::where('number',$fields['number'])->first();
        $token = $student->createToken('myapptoken')->plainTextToken;
        $response = [
            'student' => $student,
            'token' => $token
        ];
        
        return response($response, 201);
}
}

