<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quizz;
use App\Models\Question;

class QuizzController extends Controller
{
    public function add_quizz(Request $request )
    {
        $response = array();
        $quizz = new Quizz();

        $quizz->title = $request->title;
        $quizz->chapter_id = $request->chapter_id;
        $quizz->duration = $request->duration;
        $quizz->save();

        $response['code'] = 200;
        $response['message'] = 'Quizz has been created successfully, add questions for this quizz';
        $response['data'] = $quizz;

        return response()->json($response);
    }

    public function add_question_to_quizz(Request $request)
    {
        $response = array();
        // dd($request->option_d);
        $quizz = Quizz::find($request->quizz_id);
        // dd($quizz);
        $question = new Question();

        $question->quizz_id =  $quizz->id;
        $question->description =  $request->description;
        $question->option_a =  $request->option_a;
        $question->option_b =  $request->option_b;
        $question->option_c =  $request->option_c;
        $question->option_d =  $request->option_d;
        $question->correct_option = $request->correct_option;
        $question->save();

        $response['code'] = 200;
        $response['message'] = 'Question added for the quizz: '. $quizz->title;
        $response['data'] = $question;

        return response()->json($response);

    }


    public function get_quizz_questions($id)
    {
        $response = array();

        $questions = Question::where('id',$id)->get();

        $response['code'] = 200;
        $response['data'] = $questions;

        return response()->json($response);

    }
    public function update_quiz_question(Request $request)
    {
        $question = Question::find($request->question_id);
        if(!$question)
        {
            $response['code'] = 200;
            $response['message'] = 'No question found with the given id';

        } else {
            $question->description =  $request->description;
            $question->option_a =  $request->option_a;
            $question->option_b =  $request->option_b;
            $question->option_c =  $request->option_c;
            $question->option_d =  $request->option_d;
            $question->correct_option = $request->correct_option;
            $question->update();

            $response['code'] = 200;
            // $response['message'] = 'Question added for the quizz: '. $quizz->title;
            $response['data'] = $question;

        }

        return response()->json($response);
    }




}
