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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/adminAuth','admin\AdminAuthController@logIn');
Route::get('/getAllUnits','admin\UnitsController@getAllUnits');
Route::post('/createUnit','admin\UnitsController@createUnit');
Route::get('/getUnitById/{id}','admin\UnitsController@getUnitById');
Route::post('/editUnit','admin\UnitsController@editUnit');
Route::get('/deleteUnitById/{id}','admin\UnitsController@deleteUnitById');
Route::post('/createVisitor','admin\VisitorController@createVisitor');
Route::get('/getAllVisitors/{status}','admin\VisitorController@getAllVisitors');
Route::get('/checkOutById/{id}','admin\VisitorController@checkOutById');
Route::post('/visitorRegister','user\RegisterController@visitorRegister');