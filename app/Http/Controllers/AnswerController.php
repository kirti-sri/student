<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{

    //quizz_id
    //user_id
    //time_taken
    //question_id =>
    public function validate_answers(Request $request)
    {
        $response = array();
        $questions = Question::where('quizz_id', '=', $request->quizz_id)->get();

        $i = 1;
        $score = 0;
        // $user_id = Auth::user()->id;
        $user_id = $request->user_id;
        $result = Result::create([
            'user_id' => $user_id,
            'total_score' => 0,
            'quizz_id' => $request->quizz_id,
            'time_taken' => $request->time_taken
        ]);
        foreach ($questions as $question) {
            // Get the user's answer for the current question
            $userAnswer = $request->input('question_' . $question->id);
            if ($userAnswer == $question->correct_option) {
                // If the answers match, increment the score
                $score++;
                $answer = Answer::create([
                    'user_id' => $user_id,
                    'question_id' => $question->id,
                    'answer' => $userAnswer,
                    'is_correct' => true,
                    'result_id' => $result->id
                ]);
            } else {
                $answer = Answer::create([
                    'user_id' => $user_id,
                    'question_id' => $question->id,
                    'answer' => $userAnswer,
                    'is_correct' => false,
                    'result_id' => $result->id
                ]);
            }
        }

        $result->update([
            'total_score' => $score,
        ]);

        $response['code'] = 200;
        $response['result'] = $result;


        return response()->json($response);

    }
}