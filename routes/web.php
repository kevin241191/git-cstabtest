<?php

use App\Http\Controllers\{CategoriesController, HomeController, AuthController, ClientController, ConfigurationController,
GroupeController, ModeController};
use Illuminate\Support\Facades\Route;

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
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'handleLogin'])->name('handleLogin');

Route::get('forgot-password', [AuthController::class, 'forgot'])->name('forgot');
Route::post('forgot-password', [AuthController::class, 'forgot_password']);

Route::get('reset/{token}', [AuthController::class, 'reset'])->name('reset');

Route::post('reset/{token}', [AuthController::class, 'post_reset']);
Route::post('reset', [AuthController::class, 'reset'])->name('post.reset');

Route::get('/validate-account/{email}', [\App\Http\Controllers\Admin\UserController::class, 'defineAccess']);
Route::post('/validate-account/{email}', [\App\Http\Controllers\Admin\UserController::class, 'submitDefineAccess'])->name('submitDefineAccess');

Route::resource('configurations', ConfigurationController::class);


Route::prefix('configurations')->group(function () {
    // Route::get('/', [ConfigurationController::class, 'index'])->name('configurations');
    Route::get('/delete/{configuration}', [ConfigurationController::class, 'delete'])->name('configurations.delete');
});



route::prefix('admin')->name('admin')->group(function () {
    route::resource('user', \App\Http\Controllers\Admin\UserController::class)->except(['show']);   
});
//user
Route::prefix('user')->group(function () {
    Route::get('/delete/{user}', [\App\Http\Controllers\Admin\UserController::class, 'delete'])->name('user.delete');
});

//route sans connection
Route::resource('categorie', CategoriesController::class);
Route::resource('client', ClientController::class);
Route::resource('groupe', GroupeController::class);
Route::resource('mode', ModeController::class);

