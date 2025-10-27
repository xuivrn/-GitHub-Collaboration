<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('rooms', RoomController::class);
Route::resource('subjects', SubjectController::class);
Route::resource('students', StudentController::class);
Route::get('/overview', [StudentController::class, 'overview'])->name('overview');