<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  //  return $request->user();
//});

Route::post('user/login',[AuthController::class,'login']);
Route::post('user/register',[AuthController::class,'register']);

Route::get('category',[AuthController::class,'categoryList'])->middleware('auth:sanctum');

//all course
Route::get('allCourseList',[CourseController::class,'getAllCourse']);
//search course
Route::post('course/search',[CourseController::class,'courseSearch']);
Route::post('course/details',[CourseController::class,'courseDetails']);

//all category
Route::get('allCategory',[CategoryController::class,'getAllCategory']);
//search category
Route::post('category/search',[CategoryController::class,'categorySearch']);
