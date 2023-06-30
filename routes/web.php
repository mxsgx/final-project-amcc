<?php

use App\Models\Category;
use App\Models\Course;
use App\Models\Lecture;
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

    Route::redirect('/', '/users')->name('root');
});

Route::domain('instructor.'.config('app.host'))->name('instructor.')->middleware(['auth'])->group(function () {
    Route::prefix('/courses')->name('courses.')->group(function () {
        Route::controller(\App\Http\Controllers\Instructor\CourseController::class)->group(function () {
            Route::get('/', 'showIndexPage')->name('index')->middleware(['can:viewAny,'.Course::class]);
            Route::post('/', 'create')->name('store')->middleware(['can:create,'.Course::class]);
            Route::get('/create', 'showCreatePage')->name('create')->middleware(['can:create,'.Course::class]);
            Route::get('/{course}', 'showEditPage')->name('edit')->middleware(['can:update,course']);
            Route::patch('/{course}', 'update')->name('update')->middleware(['can:update,course']);
            Route::delete('/{course}', 'delete')->name('delete')->middleware(['can:delete,course']);
        });

        Route::prefix('/{course}/lectures')->name('lectures.')->controller(\App\Http\Controllers\Instructor\LectureController::class)->scopeBindings()->group(function () {
            Route::get('/', 'showIndexPage')->name('index')->middleware(['can:viewAny,'.Lecture::class]);
            Route::post('/', 'create')->name('store')->middleware(['can:create,'.Lecture::class]);
            Route::get('/create', 'showCreatePage')->name('create')->middleware(['can:create,'.Lecture::class]);
            Route::get('/{lecture}', 'showEditPage')->name('edit')->middleware(['can:update,lecture']);
            Route::patch('/{lecture}', 'update')->name('update')->middleware(['can:update,lecture']);
            Route::delete('/{lecture}', 'delete')->name('delete')->middleware(['can:delete,lecture']);
        });
    });

    Route::redirect('/', '/courses')->name('root');
});

Route::prefix('/auth')->controller(\App\Http\Controllers\AuthController::class)->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::get('/login', 'showLoginPage')->name('auth.login');
        Route::post('/login', 'login');
        Route::get('/register', 'showRegisterPage')->name('auth.register');
        Route::post('/register', 'register');
    });

    Route::post('/logout', 'logout')->name('auth.logout');

    Route::redirect('/', '/auth/login')->name('root');
});

Route::prefix('/course/{course}')->name('course.')->group(function () {
    Route::get('/', [\App\Http\Controllers\CourseController::class, 'showViewPage'])->name('view');

    Route::controller(\App\Http\Controllers\Student\CourseController::class)->middleware(['auth'])->group(function () {
        Route::post('/enroll', 'enrollCourse')->name('enroll')->middleware(['can:enroll,course']);

        Route::prefix('/learn')->name('learn.')->middleware(['can:learn,course'])->group(function () {
            Route::get('/', 'startLearningCourse')->name('start');
            Route::get('/{lecture}', 'learnCourse')->name('lecture');
        });
    });
});

Route::get('/my-courses', [\App\Http\Controllers\Student\CourseController::class, 'showIndexPage'])->name('my-courses')->middleware(['auth']);

Route::prefix('/courses')->name('courses.')->controller(\App\Http\Controllers\CourseController::class)->group(function () {
    Route::get('/', 'showIndexPage')->name('index');
});

Route::get('/', function () {
    return view('welcome');
})->name('root');
