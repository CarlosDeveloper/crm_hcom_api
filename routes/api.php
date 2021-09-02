<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me');
    Route::post('register', 'App\Http\Controllers\AuthController@register');
});


Route::get('/companies','App\Http\Controllers\CompanyController@index')->middleware('translate');//get all Companies
Route::post('/companies','App\Http\Controllers\CompanyController@store')->middleware('translate');//create Company
Route::put('/companies/{id}','App\Http\Controllers\CompanyController@update')->middleware('translate');//update Company
Route::delete('/companies/{id}','App\Http\Controllers\CompanyController@destroy')->middleware('translate');//delete Company

Route::get('/employees','App\Http\Controllers\EmployeeController@index')->middleware('translate');//get all Employees
Route::post('/employees','App\Http\Controllers\EmployeeController@store')->middleware('translate');//create Employee
Route::put('/employees/{id}','App\Http\Controllers\EmployeeController@update')->middleware('translate');//update Employee
Route::delete('/employees/{id}','App\Http\Controllers\EmployeeController@destroy')->middleware('translate');//delete Employee


