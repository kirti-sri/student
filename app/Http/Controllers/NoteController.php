<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Topic;
use App\Models\Note;

class NoteController extends Controller
{
    public function get_notes($topic_id)
    {   
        $response = array();

        $notes = Note::where('topic_id',$topic_id)->get();

        $response['code'] = 200;
        $response['data'] = $notes;
        
        return response()->json($response);
    }
}
