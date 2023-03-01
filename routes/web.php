<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//route resource
Route::resource('/posts', \App\Http\Controllers\PostController::class);
Route::resource('/students', \App\Http\Controllers\StudentsController::class);
Route::resource('/students', \App\Http\Controllers\StudentsController::class);
Route::resource('/members', \App\Http\Controllers\MembersController::class);
Route::resource('/groups', \App\Http\Controllers\GroupsController::class);
Route::resource('/presences',\App\Http\Controllers\PresencesController::class);
Route::resource('/schedules',\App\Http\Controllers\SchedulesController::class);
Route::resource('/absensis', \App\Http\Controllers\AbsensisController::class);
Route::resource('/quizzes', \App\Http\Controllers\QuizzesController::class);

//Route::resource('members', 'MembersController');
//Route::resource('students', 'StudentsController');
//Route::resource('groups', 'GroupsController');


Route::get('/attendance', function () {
   return view('absensi');
});

