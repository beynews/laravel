<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//route resource
Route::resource('/posts', \App\Http\Controllers\PostController::class);
Route::resource('/students', \App\Http\Controllers\StudentController::class);

Route::resource('members', 'MembersController');
Route::resource('students', 'StudentsController');
Route::resource('groups', 'GroupsController');