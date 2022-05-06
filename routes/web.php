<?php

// login y register
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\auth\RegisterAdminController;

// dashboards
use App\Http\Controllers\Dashboard\AdminDashboardController;
use App\Http\Controllers\Dashboard\StylistDashboardController;
use App\Http\Controllers\Dashboard\ClientDashboardController;
use App\Http\Controllers\ChangePasswordController;

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
// Route::get('/registerAdmin', [RegisterAdminController::class, 'show']);
// Route::post('/registerAdmin', [RegisterAdminController::class, 'register'])->name('registerAdmin');


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


// Dashboards
Route::get('/admin', [AdminDashboardController::class, 'show'])
    ->name('admin.dashboard');

Route::get('/estilista', [StylistDashboardController::class, 'show'])
    ->name('stylist.dashboard');

Route::get('/cliente', [ClientDashboardController::class, 'show'])
    ->name('client.dashboard');


// Admin Pages
Route::get('/admin/estilistas', [StylistController::class, 'show'])
    ->name('admin.stylists');

Route::post('/admin/estilistas', [StylistController::class, 'store'])
    ->name('store.stylist');

Route::get('/admin/estilistas/editar/{rut}', [StylistController::class, 'edit'])
    ->name('edit.stylist');

Route::post('/admin/estilistas/editar/{rut}', [StylistController::class, 'update'])
    ->name('update.stylist');

Route::post('/admin/estilistas/cambiarEstado/{rut}', [StylistController::class, 'changeStatus'])
    ->name('changeStatus.stylist');

//Clientes
Route::get('/cliente/editar', [ClientDashboardController::class, 'show_editar'])
    ->name('edit.client');

Route::post('/cliente/editar/{rut}', [ClientDashboardController::class, 'update'])
    ->name('update.client');


//Change password
Route::get('/changepassword', [ChangePasswordController::class, 'show'])
    ->name('edit.password');

Route::post('/changepassword/{rut}', [ChangePasswordController::class, 'update'])
    ->name('update.password');
