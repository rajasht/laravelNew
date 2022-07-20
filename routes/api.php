<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BookController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// BOOK TABLE CRUD OPERATIONS
Route::get('getbooks',[BookController::class,'getAllBooks']);
Route::get('getbook/{bk_dtl}',[BookController::class,'getThisBook']);
Route::post('addbook',[BookController::class,'addBook']);
Route::put('updatebook',[BookController::class,'updateBook']);
Route::delete('deletebook/{bk_name}',[BookController::class,'deletebook']);


// STUDENT TABLE CRUD OPERATION
ROute::get('getstds',[StudentController::class,'getAllStudent']);
ROute::get('getstd/{std_nm}',[StudentController::class,'getThisStudent']);
Route::post('addstud',[StudentController::class,'addStudent']);
Route::put('updstud',[StudentController::class,'updateStd']);
Route::delete('delstud/{stud_name}',[StudentController::class,'deleteStudent']);
