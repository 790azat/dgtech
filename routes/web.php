<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ItemController;
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

Route::get('/p',[\App\Http\Controllers\ParserController::class,'index']);

Route::get('/reset', function () {
    Artisan::call('db:wipe');
    Artisan::call('migrate:fresh');
    Artisan::call('db:seed');
    return redirect()->route('welcome');
});


Route::get('/',[ItemController::class, 'index'])->name('welcome');
Route::get('/item/{id}',[ItemController::class, 'show_item']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('/admin-items','admin.pages.items',['items' => Item::all(),'categories' => Category::all()])->name('admin-items');
Route::view('/admin-categories','admin.pages.categories',['categories' => Category::all()])->name('admin-categories');
Route::view('/admin-users','admin.pages.users',['users' => User::all()])->name('admin-users');
Route::post('/add-item',[AdminController::class, 'add_item']);
Route::get('/delete-item/{id}',[AdminController::class, 'delete_item']);
