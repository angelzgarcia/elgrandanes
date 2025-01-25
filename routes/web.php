<?php

use App\Http\Controllers\Admin\EventsController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\EventsController as UserEventsController;
use Illuminate\Support\Facades\Route;

Route::get('/storage/files/{filename}', function ($filename) {
    $path = storage_path("app/public/files/{$filename}");
    if (!file_exists($path)) {
        abort(404);
    }

    return response()->file($path, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'inline; filename="' . $filename . '"',
    ]);
});

// R U T A S     U S U A R I O S
Route::prefix('')
    -> group(function() {
        Route::get('', function () {
            return view('users.home');
        })-> name('home');

        Route::get('/menu', function() {
            return view('users.menu');
        }) -> name('menu');

        Route::prefix('/events')
            -> controller(UserEventsController::class)
            -> group(function() {
                Route::get('/upcoming', 'upcomingEventsIndex') -> name('upcoming-events.index');
                Route::get('/upcoming/{slug}', 'updateCurrentEvent') -> name('events.updateCurrentEvent');
                Route::get('/previous', 'previousEventsIndex') -> name('previous-events.index');
            });
    });





// R U T A S    A U T H
Route::prefix('/auth')
    -> middleware('guest')
    -> controller(AuthController::class)
    -> group(function() {

        Route::get('/singup', 'showRegisterForm') -> name('singup.show');
        Route::post('/singup', 'singUp') -> name('singup');
        Route::get('/login', 'showLoginForm') -> name('login.show');
        Route::post('/login', 'login') -> name('login');
    });
Route::post('/auth/logout', [AuthController::class, 'logout']) -> name('logout');





//   R U T A S    D E L   A D M I N I S T R A D O R
Route::prefix('/admin')
    -> middleware('auth')
    -> group(function() {

        Route::get('/dashboard',[ HomeController::class, 'index']) -> name('dashboard');

        // C R U D     U S U AR I O S
        Route::prefix('/users')
            -> controller(UsersController::class)
            -> group(function() {
                Route::get('', 'index') -> name('users.index');
            });

        // C R U D    M E N U
        Route::prefix('/menu')
            -> controller(MenuController::class)
            -> group(function() {
                Route::get('/create', 'create') -> name('menu.create');
                Route::post('/store', 'store') -> name('menu.store');
                Route::get('/{menu}', 'show') -> name('menu.show');
                Route::get('/{menu}/edit', 'edit') -> name('menu.edit');
                Route::put('/{menu}', 'update') -> name('menu.update');
                Route::delete('/{id}', 'destroy') -> name('menu.destroy');
            });

        // C R U D     E V E N T O S
        Route::prefix('/events')
            -> controller(EventsController::class)
            -> group(function() {
                Route::get('', 'index') -> name('admin.events.index');
                Route::get('/create', 'create') -> name('admin.events.create');
                Route::post('/store', 'store') -> name('admin.events.store');
                Route::get('/{event:slug}', 'show') -> name('admin.events.show');
                Route::get('{event}/edit', 'edit') -> name('admin.events.edit');
                Route::put('/{menu}', 'update') -> name('admin.events.update');
                Route::delete('/{id}', 'destroy') -> name('admin.events.destroy');
            });
    });
