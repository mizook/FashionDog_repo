<?php

// login y register
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\auth\RegisterAdminController;

// dashboards
use App\Http\Controllers\Dashboard\AdminDashboardController;
use App\Http\Controllers\Dashboard\StylistDashboardController;
use App\Http\Controllers\Dashboard\ClientDashboardController;

//Admin pages
use App\Http\Controllers\StylistController;


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

//Inicio
Route::get('/', function () {
    return view('index');
});


//Las borraré
Route::get('/registerAdmin', [RegisterAdminController::class, 'show']);
Route::post('/registerAdmin', [RegisterAdminController::class, 'register'])->name('registerAdmin');


// Login todas las entidades, register cliente y logout
Route::get('/register', [RegisterController::class, 'show'])
    ->middleware('guest');

Route::get('/login', [LoginController::class, 'show'])
    ->middleware('guest');

Route::post('/register', [RegisterController::class, 'register'])
    ->middleware('guest')
    ->name('register');

Route::post('/login', [LoginController::class, 'login'])
    ->name('login');

Route::post('/', [LoginController::class, 'logout'])->name('logout');



//Stylists
Route::post('/AdminDashboard', [StylistController::class, 'store'])
    ->middleware('auth:administrator')
    ->name('registerStylist');

Route::post('/AdminDashboard', [StylistController::class, 'update'])
    ->middleware('auth:administrator')
    ->name('updateStylist');



// Dashboards
Route::get('/AdminDashboard', [AdminDashboardController::class, 'show'])
    ->name('admin.dashboard');

Route::get('/StylistDashboard', [StylistDashboardController::class, 'show'])
    ->name('stylist.dashboard');

Route::get('/ClientDashboard', [ClientDashboardController::class, 'show'])
    ->name('client.dashboard');

// Admin Pages

Route::get('/handleStylists', [StylistController::class, 'show'])
    ->name('admin.stylists');

Route::post('/handleStylists', [StylistController::class, 'store'])
    ->name('store.stylist');

Route::get('/editStylist/{rut}', [StylistController::class, 'edit'])
    ->name('edit.stylist');

Route::post('/editStylist/{rut}', [StylistController::class, 'update'])
    ->name('update.stylist');
