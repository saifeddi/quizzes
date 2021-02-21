<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@user')->name('home');
            /*****user route */

Route::group(['middleware' => ['auth']], function () {
    Route::get('/quiz/start', 'QuizController@quizAttent')->name('quiz.start');
    Route::post('/quiz/start/store', 'QuizController@quizstore')->name('quiz.start.store');
    Route::get('/quiz/resultat/{quiz_id}', 'QuizController@result')->name('quiz.result');
});
            /*****admin route */
    Route::group(['middleware' => ['is_admin'], 'prefix' => 'dashboard'], function () {

    Route::get('home', 'HomeController@admin')->name('admin.home') ;
    Route::get('questions/create', 'Admin\QuestionController@create')->name('questions.create') ;
    Route::post('questions/store', 'Admin\QuestionController@store')->name('questions.store') ;
    Route::get('questions', 'Admin\QuestionController@index')->name('questions.index') ;
    Route::get('questions/remove/{question_id}', 'Admin\QuestionController@remove')->name('questions.remove') ;
    Route::get('questions/edit/{question_id}', 'Admin\QuestionController@edit')->name('questions.edit') ;
    Route::post('questions/update/', 'Admin\QuestionController@update')->name('questions.update') ;


});


 
