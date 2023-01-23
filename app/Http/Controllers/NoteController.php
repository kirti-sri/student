<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Topic;
use App\Models\Note;

class NoteController extends Controller
{
    public function note($topic_id)
    {
        return $notes = Note::where('topic_id',$topic_id)->get();
    }
}
