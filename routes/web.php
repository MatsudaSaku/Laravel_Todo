<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
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

Route::post('/todos', [TodoController::class, 'store'])->name('todos.store');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/todos/{todo}/edit', [TodoController::class, 'edit'])->name('todos.edit');
Route::put('/todos/{todo}', [TodoController::class, 'update'])->name('todos.update');

Route::get('/todos', [TodoController::class, 'index'])->name('todos.index');

Route::get('/todos/new',[TodoController::class, 'create'])->name('todos.create');

Route::post('/todos/error', [TodoController::class, 'error'])->name('todos.error');


Route::delete('/todos/{id}', [TodoController::class, 'destroy'])->name('todos.destroy');