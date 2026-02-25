<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', function () {
    return redirect('/todos');
});

Route::get('/todos', [TodoController::class, 'index'])->name('todos.index');

Route::post('/todos', [TodoController::class, 'store'])->name('todos.store');

Route::patch('/todos/{id}/toggle', [TodoController::class, 'toggle'])->name('todos.toggle');

Route::delete('/todos/{id}', [TodoController::class, 'destroy'])->name('todos.destroy');
