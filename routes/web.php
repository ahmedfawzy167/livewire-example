<?php

use App\Http\Controllers\PostController;
use App\Livewire\Counter;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/posts', [PostController::class, 'index']);
