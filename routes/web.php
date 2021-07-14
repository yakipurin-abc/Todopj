<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;

Route::get('/', [TodosController::class, 'index']);
Route::post('/', [TodosController::class, 'store']);
Route::patch('/', [TodosController::class, 'edit']);
Route::delete('/', [TodosController::class, 'delete']);
