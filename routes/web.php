<?php

use Illuminate\Support\Facades\Route;

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

Route::post('/employees', '\App\Http\Controllers\EmployeeController@store');
Route::patch('/employees/{employee}', '\App\Http\Controllers\EmployeeController@update');
Route::delete(
    '/employees/{employee}',
    '\App\Http\Controllers\EmployeeController@destroy'
);

Route::post('/skills', '\App\Http\Controllers\SkillController@store');
