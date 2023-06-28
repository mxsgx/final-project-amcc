<?php

use App\Enums\UserPermission;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\AuthController;
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

Route::domain('admin.'.config('app.host'))->name('admin.')->group(function () {
    Route::prefix('/users')->name('users.')->controller(UsersController::class)->group(function () {
        Route::get('/', 'showIndexPage')->name('index')->middleware(['permission:'.UserPermission::ReadUsers]);
        Route::post('/', 'create')->name('store')->middleware(['permission:'.UserPermission::CreateUsers]);
        Route::get('/create', 'showCreatePage')->name('create')->middleware(['permission:'.UserPermission::CreateUsers]);
        Route::get('/{user}', 'showEditPage')->name('edit')->middleware(['permission:'.UserPermission::UpdateUsers]);
        Route::patch('/{user}', 'update')->name('update')->middleware(['permission:'.UserPermission::UpdateUsers]);
        Route::put('/{user}/password', 'changePassword')->name('change-password')->middleware(['permission:'.UserPermission::UpdateUsers]);
        Route::delete('/{user}', 'delete')->name('delete')->middleware(['permission:'.UserPermission::DeleteUsers]);
    });
})->middleware(['auth']);

Route::prefix('/auth')->controller(AuthController::class)->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::get('/login', 'showLoginPage')->name('auth.login');
        Route::post('/login', 'login');
        Route::get('/register', 'showRegisterPage')->name('auth.register');
        Route::post('/register', 'register');
    });

    Route::post('/logout', 'logout')->name('auth.logout');
});

Route::get('/', function () {
    return view('welcome');
});
