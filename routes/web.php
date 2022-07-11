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
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/test-dashboard', function () {
    return view('softui.dashboard');
})->name('test-dashboard');


Route::get('/tables', function () {return view('softui.tables'); })->name('tables');
Route::get('/billing', function () {return view('softui.billing'); })->name('billing');
Route::get('/virtualreality', function () {return view('softui.virtualreality'); })->name('virtualreality');
Route::get('/rtl', function () {return view('softui.rtl'); })->name('rtl');
Route::get('/profile', function () {return view('softui.profile'); })->name('profile');



require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
