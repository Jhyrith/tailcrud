<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// returns the home page with all posts
Route::get('/', TaskController::class .'@index')->name('tasks.index')->middleware(['auth', 'verified'])->name('welcome');
// returns the form for adding a post
Route::get('/tasks/create', TaskController::class . '@create')->name('tasks.create');
//view all tasks
Route::get('/tasks', TaskController::class .'@index')->name('tasks.index');
// adds a post to the database
Route::post('/tasks', TaskController::class .'@store')->name('tasks.store');
// returns a page that shows a full post
Route::get('/tasks/{task}', TaskController::class .'@show')->name('tasks.show');
// returns the form for editing a post
Route::get('/tasks/{task}/edit', TaskController::class .'@edit')->name('tasks.edit');
// updates a post
Route::put('/tasks/{task}', TaskController::class .'@update')->name('tasks.update');
// deletes a post
Route::get('/tasks/{task}/delete', TaskController::class .'@destroy')->name('tasks.destroy');

//categories
Route::get('/categories/create', CategoryController::class . '@create')->name('categories.create');
//view all tasks
Route::get('/categories', CategoryController::class .'@index')->name('categories.index');
// adds a post to the database
Route::post('/categories', CategoryController::class .'@store')->name('categories.store');
// returns a page that shows a full post
Route::get('/categories/{category}', CategoryController::class .'@show')->name('categories.show');
// returns the form for editing a post
Route::get('/categories/{category}/edit', CategoryController::class .'@edit')->name('categories.edit');
// updates a post
Route::put('/categories/{category}', CategoryController::class .'@update')->name('categories.update');
// deletes a post
Route::get('/categories/{category}/delete', CategoryController::class .'@destroy')->name('categories.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/tasks', function () {
//     return view('tasks/index');
// })->middleware(['auth', 'verified'])->name('tasks');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
