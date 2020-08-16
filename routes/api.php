<?php

use Illuminate\Http\Request;

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

Route::post('register', 'API\RegisterController@register');
Route::post('login', 'API\RegisterController@login');
   
Route::group(['prefix'=>'v1','middleware' => ['auth:api']], function () {
    Route::resource('students','API\StudentController',['only'=>['index','show','store','update','destroy']]);
    Route::resource('courses','API\CourseController',['only'=>['index','show','store','update','destroy']]);
    Route::resource('students/{id}/courses','CourseStudentController');
    //Route::resource('students/{id}/courses','CourseStudentController');
   // Route::resource('students/{id}/courses','CourseStudentController',['only'=>['destroy']]);
});