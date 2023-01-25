<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ItemController;
use App\Http\Livewire\Items\Show;
use App\Models\Category;
use App\Models\Item;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
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


Route::get('/reset', function () {
    Artisan::call('db:wipe');
    Artisan::call('migrate:fresh');
    Artisan::call('db:seed');
    return redirect()->route('welcome');
});


Route::get('/',[ItemController::class,'index'])->name('welcome');
Route::get('/category/{name}',[ItemController::class,'show_category']);
Route::get('/item/{id}',[ItemController::class, 'show_item']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin-items',[AdminController::class,'index'])->name('admin-items');
Route::get('/admin-categories',[AdminController::class,'categories'])->name('admin-categories');
Route::get('/admin-users',[AdminController::class,'users'])->name('admin-users');
Route::post('/add-item',[AdminController::class, 'add_item']);
Route::get('/delete-item/{id}',[AdminController::class, 'delete_item']);
