<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\AdminPage;
use App\Http\Livewire\AdminPanel;
use App\Http\Livewire\Items;
use App\Http\Livewire\ShowCategory;
use App\Http\Livewire\ShowItem;
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

Route::get('/',Items::class)->name('welcome');
Route::get('/category/{name}', ShowCategory::class);
Route::get('/item/{id}', ShowItem::class);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/admin', AdminPanel::class)->name('admin');
Route::get('/admin/{page}', AdminPage::class);

Route::post('/add-item',[AdminController::class,'add_item'])->name('add-item');



