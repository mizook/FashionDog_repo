<?php

// login y register
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\auth\RegisterAdminController;

// dashboards
use App\Http\Controllers\Dashboard\AdminDashboardController;
use App\Http\Controllers\Dashboard\StylistDashboardController;
use App\Http\Controllers\Dashboard\ClientDashboardController;


use App\Http\Controllers\HomeController;
use App\Http\Middleware\AdminAuth;
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
    return view('index');
});


Route::get('/registerAdmin', [RegisterAdminController::class, 'show']);
Route::post('/registerAdmin', [RegisterAdminController::class, 'register'])->name('registerAdmin');


// Login y Register para todos las entidades
Route::get('/register', [RegisterController::class, 'show'])
    ->middleware('guest');

Route::post('/register', [RegisterController::class, 'register'])
    ->middleware('guest')
    ->name('register');

Route::get('/login', [LoginController::class, 'show'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [LoginController::class, 'login']);
Route::post('/', [LoginController::class, 'logout'])->name('logout');

Route::get('/home', [HomeController::class, 'index']);



// Dashboards
Route::get('/AdminDashboard', [AdminDashboardController::class, 'show'])
    ->name('admin.dashboard');

Route::get('/StylistDashboard', [StylistDashboardController::class, 'show'])
    ->name('stylist.dashboard');

Route::get('/ClientDashboard', [ClientDashboardController::class, 'show'])
    ->name('client.dashboard');
