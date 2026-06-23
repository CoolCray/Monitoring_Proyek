<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', [LoginController::class, 'login'])->name('home');
Route::get('/login/{id}', [LoginController::class, 'showlogin'])->name('login');
Route::post('/login/{id}', [LoginController::class, 'ProjectLogin'])->name('login.submit');
Route::get('/project/{id}', [LoginController::class, 'showProject'])->name('project.show');
