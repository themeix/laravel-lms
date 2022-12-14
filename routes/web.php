<?php


use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\InstallerController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/local/{ln}', function ($ln) {
    session(['local' => $ln]);
    \Illuminate\Support\Facades\App::setLocale(session()->get('local'));
    return redirect()->back();
});

Route::get('notification-url/{uuid}', [InstallerController::class, 'notificationUrl'])->name('notification.url');

Route::get('read-all-notifications', [InstallerController::class, 'readAllNotification'])->name('notification.read.all');

Auth::routes(['register' => true]);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', [LoginController::class, 'logout']);
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});




























