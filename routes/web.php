<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

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
    return redirect(app()->getLocale());
});
Route::group(['prefix' => '{locale}', 'where' => ['locale' => '[a-zA-Z]{2}'],'middleware' => 'set.language'], function() {

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/dashboard', function () {
        return view('UserDashboard');
    })->middleware(['auth', 'verified','user.access'])->name('dashboard');

    Route::get('/admin/dashboard', function () {
        return view('AdminDashboard');
    })->middleware(['auth', 'verified','admin.access'])->name('admin.dashboard');

    Route::get('/contact', function () {
        return view('contact');
    })->middleware(['auth', 'verified','user.access'])->name('contact.form');

    Route::post('/contact/form',[FormController::class,'sendEmail'])
        ->middleware(['auth', 'verified','user.access'])
        ->name('send.email');


    require __DIR__.'/auth.php';

});

