<?php

use App\Http\Controllers\GradeController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('home');
})->name('home');

Route::resource('students', StudentController::class);
Route::resource('lectures', LectureController::class);
Route::resource('grades', GradeController::class);

Route::middleware(['auth'])->group(function () {
    Route::resource('grades', GradeController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
