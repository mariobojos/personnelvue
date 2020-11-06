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


// This will override the Laravel routing with the Vue-Router
Route::get('/{vue_capture?}', function () {
    return view('index');
})->where('vue_capture', '[\/\w\.-]*');

Route::view('/', 'index');

Route::post('/employees', '\App\Http\Controllers\EmployeeController@store');
Route::patch('/employees/{employee}', '\App\Http\Controllers\EmployeeController@update');
Route::delete(
    '/employees/{employee}',
    '\App\Http\Controllers\EmployeeController@destroy'
);

Route::post('/skill', '\App\Http\Controllers\SkillController@store');

Route::post('/departments', '\App\Http\Controllers\DepartmentController@store');
Route::patch('/departments/{department}', '\App\Http\Controllers\DepartmentController@update');
