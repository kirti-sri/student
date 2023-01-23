<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;
use App\Helper\BoardHelper;
use App\Models\User;

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
            'user_id'=>$request->user_id,
            'board_name'=>$bd->boardtype($request->board_type_id),
            'standard'=>$request->standard
        ]);
        
        $user=User::where('id',$request->user_id)->first();
        $user->update([
            'board_type_id' => $board->id
        ]);
        $response="Board saved successfully";
        return response($response,200);
    }
}