<?php

use App\Models\Category;
use App\Models\User;
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

Route::domain('admin.'.config('app.host'))->name('admin.')->middleware(['auth'])->group(function () {
    Route::prefix('/users')->name('users.')->controller(\App\Http\Controllers\Admin\UserController::class)->group(function () {
        Route::get('/', 'showIndexPage')->name('index')->middleware(['can:viewAny,'.User::class]);
        Route::post('/', 'create')->name('store')->middleware(['can:create,'.User::class]);
        Route::get('/create', 'showCreatePage')->name('create')->middleware(['can:create,'.User::class]);
        Route::get('/{user}', 'showEditPage')->name('edit')->middleware(['can:update,user']);
        Route::patch('/{user}', 'update')->name('update')->middleware(['can:update,user']);
        Route::put('/{user}/password', 'changePassword')->name('change-password')->middleware(['can:update,user']);
        Route::delete('/{user}', 'delete')->name('delete')->middleware(['can:delete,user']);
    });

    Route::prefix('/categories')->name('categories.')->controller(\App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('/', 'showIndexPage')->name('index')->middleware(['can:viewAny,'.Category::class]);
        Route::post('/', 'create')->name('store')->middleware(['can:create,'.Category::class]);
        Route::get('/create', 'showCreatePage')->name('create')->middleware(['can:create,'.Category::class]);
        Route::get('/{category}', 'showEditPage')->name('edit')->middleware(['can:update,category']);
        Route::patch('/{category}', 'update')->name('update')->middleware(['can:update,category']);
        Route::delete('/{category}', 'delete')->name('delete')->middleware(['can:delete,category']);
    });

    Route::get('/', function () {
        return view('welcome');
    });
});

Route::prefix('/auth')->controller(\App\Http\Controllers\AuthController::class)->group(function () {
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
