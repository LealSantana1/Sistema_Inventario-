<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\AdminsController;
use App\Http\Controllers\Backend\Auth\ForgotPasswordController;
use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\CotizacionController;
use App\Models\Cotizacion;
use App\Models\Productos;

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

// Public Routes
Auth::routes();

// Home Routes
//Route::get('/', [HomeController::class, 'redirectAdmin'])->name('index');
//Route::get('/home', [HomeController::class, 'index'])->name('home');


// Admin Authentication Routes (public)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login/submit', [LoginController::class, 'login'])->name('login.submit');
    Route::post('/logout/submit', [LoginController::class, 'logout'])->name('logout.submit');
    Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/password/reset', [ForgotPasswordController::class, 'reset'])->name('password.update');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('productos/pdf', [ProductosController::class, 'pdf'])->name('productos.pdf');
    Route::get('productos', [ProductosController::class, 'index'])->name('productos.index');
    Route::get('productos/create', [ProductosController::class, 'create'])->name('productos.create');
    Route::post('productos', [ProductosController::class, 'store'])->name('productos.store');
    Route::get('productos/{id}/edit', [ProductosController::class, 'edit'])->name('productos.edit');
    Route::put('productos/{id}', [ProductosController::class, 'update'])->name('productos.update');
    Route::delete('productos/{id}', [ProductosController::class, 'destroy'])->name('productos.destroy');
    Route::resource('admin/productos', ProductosController::class);


});


Route::prefix('admin')->group(function () {
    Route::get('categorias/pdf', [CategoriasController::class, 'pdf'])->name('categorias.pdf');
    //Route::get('categorias/pdf', [CategoriasController::class, 'pdf'])->name('categorias.pdf');
    Route::get('categorias', [CategoriasController::class, 'index'])->name('admin.categorias.index');
    Route::get('categorias/create', [CategoriasController::class, 'create'])->name('admin.categorias.create');
    Route::post('categorias', [CategoriasController::class, 'store'])->name('admin.categorias.store');
    Route::get('categorias/{categoria}/edit', [CategoriasController::class, 'edit'])->name('admin.categorias.edit'); // Changed {id} to {categoria}
    Route::put('categorias/{categoria}', [CategoriasController::class, 'update'])->name('admin.categorias.update'); // Changed {id} to {categoria}
    Route::delete('categorias/{categoria}', [CategoriasController::class, 'destroy'])->name('admin.categorias.destroy'); // Changed {id} to {categoria}


});

Route::prefix('admin')->group(function () {
    Route::get('proveedores', [ProveedorController::class, 'index'])->name('admin.proveedores.index');
    Route::get('proveedores/create', [ProveedorController::class, 'create'])->name('admin.proveedores.create');
    Route::post('proveedores', [ProveedorController::class, 'store'])->name('admin.proveedores.store');
    Route::get('proveedores/{proveedor}/edit', [ProveedorController::class, 'edit'])->name('admin.proveedores.edit');
    Route::put('proveedores/{proveedor}', [ProveedorController::class, 'update'])->name('admin.proveedores.update');
    Route::delete('proveedores/{proveedor}', [ProveedorController::class, 'destroy'])->name('admin.proveedores.destroy');
});


Route::prefix('admin')->group(function () {
    Route::get('cotizaciones/pdf', [CotizacionController::class, 'pdf'])->name('admin.cotizaciones.pdf');
    Route::get('cotizaciones', [CotizacionController::class, 'index'])->name('admin.cotizaciones.index');
    Route::get('cotizaciones/create', [CotizacionController::class, 'create'])->name('admin.cotizaciones.create');
    Route::post('cotizaciones', [CotizacionController::class, 'store'])->name('admin.cotizaciones.store');
    Route::get('cotizaciones/{cotizacion}/edit', [CotizacionController::class, 'edit'])->name('admin.cotizaciones.edit');
    Route::put('cotizaciones/{cotizacion}', [CotizacionController::class, 'update'])->name('admin.cotizaciones.update');
    Route::delete('cotizaciones/{cotizacion}', [CotizacionController::class, 'destroy'])->name('admin.cotizaciones.destroy');
    Route::get('cotizaciones/{cotizacion}', [CotizacionController::class, 'show'])->name('admin.cotizaciones.show');
   


});

//Route::prefix('admin')->group(function () {
  //Route::resource('productos', ProductosController::class);
    //Route::resource('admin/categorias', CategoriasController::class);
//}); 


// Admin Routes (protected by auth:admin)
Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Resource routes for roles and admins
    Route::resource('roles', RolesController::class);
    Route::resource('admins', AdminsController::class);

    // Login Routes
    //Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    //Route::post('/login/submit', [LoginController::class, 'login'])->name('login.submit');

    // Logout Routes
    //Route::post('/logout/submit', [LoginController::class, 'logout'])->name('logout.submit');

    // Password Reset Routes
    //Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    //Route::post('/password/reset/submit', [ForgotPasswordController::class, 'reset'])->name('password.update');
});