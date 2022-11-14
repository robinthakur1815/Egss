<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//blog
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/create', [App\Http\Controllers\HomeController::class, 'create'])->name('create');
Route::delete ('/destroy{id}', [App\Http\Controllers\HomeController::class, 'destroy'])->name('destroy');
Route::post('/update{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('update');
Route::get('/edit{id}', [App\Http\Controllers\HomeController::class, 'edit'])->name('edit');
Route::post('/store', [App\Http\Controllers\HomeController::class, 'store'])->name('store');

// catagery
Route::get('/catagery', [App\Http\Controllers\CategoryController::class, 'catagery'])->name('catagery');
Route::get('/add', [App\Http\Controllers\CategoryController::class, 'add'])->name('add');
Route::get('/Catageryedit{id}', [App\Http\Controllers\CategoryController::class, 'Catageryedit'])->name('Catageryedit');
Route::post('/createCatagery', [App\Http\Controllers\HomeController::class, 'createCatagery'])->name('createCatagery');
Route::post('/Catageryupdate{id}', [App\Http\Controllers\HomeController::class, 'Catageryupdate'])->name('Catageryupdate');
Route::delete('/catagerydistroy{id}', [App\Http\Controllers\CategoryController::class, 'catagerydistroy'])->name('catagerydistroy');
