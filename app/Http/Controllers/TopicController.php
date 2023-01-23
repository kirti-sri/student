<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Topic;

class TopicController extends Controller
{
    public function get_topics($chap_id)
    {   
        $response = array();

        $topics = Topic::where('chap_id',$chap_id)->get();
        
        $response['data'] = $topics;
        

        return response()->json($response);
    }
}
