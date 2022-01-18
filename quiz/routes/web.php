<?php

use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

Route::get('/', 'QuizController@welcome');

Route::get('/quiz', function () {
    session()->flush();
    return redirect('quiz/1');
});

Route::get('/quiz/{id}', 'QuizController@quiz');

Route::post('/quiz/{id}', 'QuizController@post');

Route::get('/result', 'QuizController@getResult');

Route::get('/sorry', function () {
    return view('sorry');
});
