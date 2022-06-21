<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\StudentController;
use App\Http\controllers\IndexController;

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

Route::get('/data', [IndexController::class, 'index']);
// Route::get('/add?{2}', [IndexController::class, 'groupView']);

// Route::get('students', [StudentController::class, 'index']);
// Route::get('add-students', [StudentController::class, 'create']);
// Route::get('add-students', [StudentController::class, 'store']);