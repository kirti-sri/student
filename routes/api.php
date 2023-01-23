<?php

use Illuminate\Http\Request;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TwilioSMSController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Practice_chapterController;
use App\Http\Controllers\QuizzController;
use App\Http\Controllers\AnswerController;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/register', [TwilioSMSController::class, 'index']);
Route::post('/otp-verify',[TwilioSMSController::class,'verify_otp']);



Route::get('/get-student-details/{id}', [DashboardController::class,'show']);
Route::post('/onboarding',[DashboardController::class,'onboarding_user']);
    



Route::post('/board', [BoardController::class,'store']);
Route::get('/dashboard/{id}/{subject_id}', [ChapterController::class,'view']);
Route::get('/dashboard/{id}/{subject_id}/{chap_id}', [TopicController::class,'watch']);
Route::get('note/{Note_id}', [NoteController::class,'note']);
Route::get('video/{video_id}', [VideoController::class,'video']);
Route::get('practice/{student_id}', [PracticeController::class,'practice']);
Route::get('/profile/{id}', [ProfileController::class,'profile']);
Route::get('/practice/chapter/{id}', [Practice_chapterController::class,'chap']);


Route::prefix('dashboard')->group(function () {
    Route::get('/get-student-details/{id}', [DashboardController::class,'show']);
    Route::post('onboarding',[DashboardController::class,'onboarding_user']);

    Route::get('/show-quizz/{id}',[QuizzController::class,'get_quizz_questions']);
    Route::post('/verify-quizz',[AnswerController::class,'validate_answers']);

    Route::get('/show-chapters/{subject_id}',[ChapterController::class,'get_chapters']);
    Route::get('/show-topics/{chapter_id}',[TopicController::class,'get_topics']);

    
});


Route::post('/add-quizz',[QuizzController::class,'add_quizz']);
Route::post('/add-question-to-quizz',[QuizzController::class,'add_question_to_quizz']);

