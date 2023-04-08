<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

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
    return view('welcome');
});

Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('/single-product/{id}',[HomeController::class,'singleProduct'])->name('single.product');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::get('/add-user',[UserController::class,'addUser'])->name('add.user');
    Route::get('/manage-user',[UserController::class,'manageUser'])->name('manage.user');
    Route::post('/new-user',[UserController::class,'saveUser'])->name('new.user');
    Route::get('/new-edit/{id}',[UserController::class,'editUser'])->name('user.edit');
    Route::post('/new-delete',[UserController::class,'deleteUser'])->name('user.delete');
    Route::post('/update-user',[UserController::class,'updateUser'])->name('update.user');

    Route::get('/add-product',[ProductController::class,'addProduct'])->name('add.product');
    Route::get('/manage-product',[ProductController::class,'manageProduct'])->name('manage.product');
    Route::post('/new-product',[ProductController::class,'saveProduct'])->name('new.product');
    Route::get('/edit-product/{id}',[ProductController::class,'productEdit'])->name('edit.product');
    Route::get('/status-product/{id}',[ProductController::class,'productStatus'])->name('status.product');
    Route::post('/delete-product',[ProductController::class,'productDelete'])->name('delete.product');
    Route::post('/update-product',[ProductController::class,'productUpdate'])->name('update.product');
});
