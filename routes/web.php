<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('users.home');
}) -> name('home');



//   R U T A S    D E L   A D M I N I S T R A D O R
Route::prefix('/admin')
    -> group(function() {

        Route::get('',[ HomeController::class, 'index']) -> name('dashboard');

        Route::prefix('/users')
            -> controller(UsersController::class)
            -> group(function() {
                Route::get('', 'index') -> name('users.index');
            });

        Route::prefix('/menu')
            -> controller(MenuController::class)
            -> group(function() {
                Route::get('/create', 'create') -> name('menu.create');
                Route::post('/store', 'store') -> name('menu.store');
                Route::get('/{menu}', 'show') -> name('menu.show');
                Route::get('/{menu}/edit', 'edit') -> name('menu.edit');
                Route::put('/{menu}', 'update') -> name('menu.update');
                Route::delete('/{menu}', 'destroy') -> name('menu.destroy');
            });
    });
