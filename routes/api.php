<?php

use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('user/signup',[UserController::class,'createProfile']);
Route::post('admin/signup',[AdminController::class,'createProfile']);

Route::middleware('auth:userapi')->group(function(){
    Route::get('user/profile',[UserController::class,'getProfile']);
    Route::get('user/deleteprofile',[UserController::class,'deleteProfile']);
});
Route::middleware('auth:adminapi')->group(function(){
    Route::get('admin/profile',[AdminController::class,'getProfile']);
    Route::get('admin/deleteprofile',[AdminController::class,'deleteProfile']);
});
