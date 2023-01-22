<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function store_result(Request $request)
    {
        $answers = array();

        $answers = Question::where('quizz_id','=',$request->quizz_id)->get();

        $i = 1;
        $correct = 0;
        foreach ($answers as $answer) {
           if($answer->correct_option === $answer[$i])
           {
                $correct++;
           } else {

           }

           $i++;
           $total++;
        }


        Result::create([
            'user_id' => $request->user_id,
            'total_score' => $total,
            'quizz_id' => $request->quizz_id
        ]);

    }
}
