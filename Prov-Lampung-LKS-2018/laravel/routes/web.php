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

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function(){

    // ADD Questions
    Route::get('/home/question/add', 'QuestionsController@addQuestion')->name('addQuest.Question');
    Route::post('/home/question/add', 'QuestionsController@addsQuestion')->name('addsQuest.Question');

    //Explorer
    Route::get('/home/question', 'QuestionsController@detailQuestion')->name('detailQuest.Question');

    // detail
    Route::get('/home/question/view/{id_questions}', 'QuestionsController@detailsQuestion')->name('detailsQuest.Question');

    // edit questions
    Route::get('/home/question/view/edit/{id_questions}', 'QuestionsController@editQuestion')->name('editQuest.Question');
    Route::post('/home/question/view/edits/{id_questions}', 'QuestionsController@editsQuestion')->name('editsQuest.Question');

    // Hapus Pertanyaan
    Route::get('/home/question/view/hapus/{id_questions}', 'QuestionsController@deleteQuestion')->name('hapusQuest.Question');

    // insert Jawaban
    Route::post('/home/question/view/answers/{id_questions}', 'QuestionsController@answerQuestion')->name('answerQuest.Question');

    // Berikan Komentar
    Route::get('/home/question/view/komentar/{id_questions}', 'QuestionsController@komentarQuestion')->name('komentarQuest.Question');
    Route::post('/home/question/view/komentars/{id_questions}', 'QuestionsController@komentarsQQuestion')->name('komentarsQuest.Question');

});
