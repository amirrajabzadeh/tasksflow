<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('dashboard', DashboardController::class);

Route::resource('projects', ProjectController::class)->middleware('role:admin,team_leader');

Route::resource('tasks', TaskController::class);

Route::post('tasks/{task}/update-status', [TaskController::class, 'updateStatus'])->name('tasks.update-status');
