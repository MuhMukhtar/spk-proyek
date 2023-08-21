<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CreateUserController;
use App\Http\Controllers\EditUserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EditClientController;
use App\Http\Controllers\CreateClientController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EditProjectController;
use App\Http\Controllers\CreateProjectController;
use App\Http\Controllers\ReviewProjectController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\RankingController;

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

Route::get('/', function () {
    return view('beranda');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('products', ProductsController::class);
Route::resource('about', AboutController::class);
Route::resource('contact', ContactController::class);
Route::resource('user', UserController::class);
Route::resource('createUser', CreateUserController::class);
Route::resource('editUser', EditUserController::class);
Route::resource('client', ClientController::class);
Route::resource('editClient', EditClientController::class);
Route::resource('createClient', CreateClientController::class);
Route::resource('project', ProjectController::class);
Route::resource('editProject', EditProjectController::class);
Route::resource('createProject', CreateProjectController::class);
Route::resource('reviewProject', ReviewProjectController::class);
Route::resource('perhitungan', PerhitunganController::class);
Route::resource('ranking', RankingController::class);

