<?php

// login y register
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\auth\RegisterAdminController;

// dashboards
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\StylistController;
use App\Http\Controllers\Dashboard\ClientController;

use App\Http\Controllers\ChangePasswordController;


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
Route::get('/testpage', [RegisterAdminController::class, 'showTestPage'])->name('testpage');


// Login todas las entidades, register cliente y logout
Route::get('/register', [RegisterController::class, 'show'])->middleware('guest');
Route::get('/login', [LoginController::class, 'show'])->middleware('guest');

Route::post('/register', [RegisterController::class, 'register'])->middleware('guest')->name('register');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/', [LoginController::class, 'logout'])->name('logout');


// Dashboards
Route::get('/admin', [AdminController::class, 'show_dashboard'])->name('admin.dashboard');
Route::get('/estilista', [StylistController::class, 'show_dashboard'])->name('stylist.dashboard');
Route::get('/cliente', [ClientController::class, 'show_dashboard'])->name('client.dashboard');


// Admin Pages
Route::get('/admin/estilistas', [AdminController::class, 'show_stylists_page'])->name('admin.stylists');
Route::get('/admin/estilistas/editar/{rut}', [AdminController::class, 'show_edit_stylists_page'])->name('edit.stylist');

Route::post('/admin/estilistas', [AdminController::class, 'create_stylist'])->name('store.stylist');
Route::post('/admin/estilistas/editar/{rut}', [AdminController::class, 'update_stylist'])->name('update.stylist');
Route::post('/admin/estilistas/cambiarEstado/{rut}', [AdminController::class, 'status_stylist'])->name('changeStatus.stylist');



//Clientes
Route::get('/cliente/editar', [ClientController::class, 'show_edit_page'])->name('edit.client');
Route::post('/cliente/editar/{rut}', [ClientController::class, 'update_client'])->name('update.client');


//Change password
Route::get('/cambiarcontraseña', [ChangePasswordController::class, 'show_page'])->name('edit.password');
Route::post('/cambiarcontraseña/{rut}', [ChangePasswordController::class, 'update_password'])->name('update.password');
