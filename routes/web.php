<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BookController;

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

// BOOK DATABASE OPERATIONS :

Route::view('addbook','Bookdetails');
Route::post('addbook',[BookController::class,'bookDetails']);

Route::get('booklist',[BookController::class,'bookList']);

Route::get('deletebook/{bk_id}',[BookController::class,'delBook']);
Route::get('editbook/{bk_id}',[BookController::class,'editBook']);
Route::post('editbook',[BookController::class,'updateBk']);

// STUDENT DATABASE OPERATIONS :

Route::view('addstd','Studentdetails');
Route::post('addstd',[StudentController::class,'studentDetails']);

Route::get('stdlist',[StudentController::class,'studentsList']);

Route::get('deletestud/{bk_id}',[StudentController::class,'delStud']);

Route::get('editstd/{bk_id}',[StudentController::class,'editStdDtl']);
Route::post('editstud',[StudentController::class,'updateStudent']);

// for join table related Queries
Route::get('show',[StudentController::class,'showQueryResult']);

// for Accessor and Mutators
Route::get('accr',[StudentController::class,'accr']);
Route::get('mttr',[StudentController::class,'mttr']);

// One to One

Route::get('o2o',[StudentController::class,'index']);

