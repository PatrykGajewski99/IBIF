<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('UserDashboard');
})->middleware(['auth', 'verified','user.access'])->name('dashboard');

Route::get('/admin/dashboard', function () {
    return view('AdminDashboard');
})->middleware(['auth', 'verified','admin.access'])->name('admin.dashboard');

require __DIR__.'/auth.php';
