<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\DivisionController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\UpazilaController;
use App\Http\Controllers\Backend\ProfileController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>'test'],function(){
    Route::prefix('users')->group(function(){
      Route::get('/view', [UserController::class, 'view'])->name('users.view');
      Route::get('/add', [UserController::class, 'add'])->name('users.add');
      Route::post('/store', [UserController::class, 'store'])->name('users.store');
      Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
      Route::post('/update/{id}', [UserController::class, 'update'])->name('users.update');
      Route::get('/delete/{id}', [UserController::class, 'delete'])->name('users.delete');
    });

    Route::prefix('profiles')->group(function(){
      Route::get('/view', [ProfileController::class, 'view'])->name('profiles.view');
      Route::get('/edit', [ProfileController::class, 'edit'])->name('profiles.edit');
      Route::post('/store', [ProfileController::class, 'update'])->name('profiles.update');
      Route::get('/password/view', [ProfileController::class, 'passwordView'])->name('profiles.password.view');
      Route::post('/password/update', [ProfileController::class, 'passwordUpdate'])->name('profiles.password.update');
    });

    Route::resource('divisions', DivisionController::class);
    Route::resource('districts', DistrictController::class);
    Route::resource('upazilas', UpazilaController::class);

});
