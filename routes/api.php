<?php

use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\TodoListController;
use App\Http\Controllers\Api\UserInfoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(AuthenticationController::class)->group(function (){
    Route::get('/login', 'login');
    Route::post('/login', 'loggedIn');
    
    Route::get('/registration', 'register');
    Route::post('/registration', 'registered');

    Route::post('/logout', 'logout')->middleware('auth:sanctum');
});
Route::apiResource('profile', UserInfoController::class)->middleware('auth:sanctum');
Route::apiResource('to-do-list',TodoListController::class)->middleware('auth:sanctum')->names('todolist');