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


Route::get('/', 'HomeController@task1')->name('task1');
Route::post('savedata', 'HomeController@savedata')->name('savedata');

Route::get('articles', 'HomeController@articles')->name('articles');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Grading System
Route::get('grades', 'GradingController@index')->name('grades-home');
Route::get('add-grade', 'GradingController@create')->name('add-grade');
Route::post('save-grade', 'GradingController@save')->name('save-grade');
Route::post('save-student-marks', 'GradingController@saveMarks')->name('save-student-marks');

Route::get('add-class', 'ClassController@create')->name('add-class');
Route::post('save-class', 'ClassController@save')->name('save-class');

Route::get('add-subject', 'SubjectController@create')->name('add-subject');
Route::post('save-subject', 'SubjectController@save')->name('save-subject');

Route::get('add-student', 'StudentController@create')->name('add-student');
Route::post('save-student', 'StudentController@save')->name('save-student');
Route::get('view-student/{id}', 'StudentController@view')->name('view-student');