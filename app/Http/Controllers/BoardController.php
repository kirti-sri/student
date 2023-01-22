<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;
use App\Helper\BoardHelper;
use App\Models\Student;

class BoardController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'board_type_id' => 'required',
            'standard' => 'required',
        ]);

        $bd = new BoardHelper();

        $board=Board::create([
            'student_id'=>$request->student_id,
            'board_name'=>$bd->boardtype($request->board_id),
            'standard'=>$request->standard
        ]);
        
        $student=Student::where('id',$request->student_id)->first();
        $student->update([
            'board_id' => $board->id
        ]);
        $response="Board saved successfully";
        return response($response,200);
    }
}
