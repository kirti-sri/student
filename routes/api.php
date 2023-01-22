<?php

use App\Http\Controllers\AnswerController;
use Illuminate\Http\Request;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TwilioSMSController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\QuizzController;
use App\Models\Student;
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
// Route::post('/login', [LoginController::class,'login']);


Route::prefix('dashboard')->group(function () {
    Route::get('/show-student-details/{id}', [DashboardController::class,'show']);
});

Route::prefix('admin')->group(function () {
    Route::post('/board', [BoardController::class,'store']);
    Route::post('/add-quizz',[QuizzController::class,'add_quizz']);
    Route::post('/add-question-to-quizz',[QuizzController::class,'add_question_to_quizz']);
    Route::get('/show-quizz/{id}',[QuizzController::class,'get_quizz_questions']);
    Route::post('/verify-quizz',[AnswerController::class,'validate_answers']);
});