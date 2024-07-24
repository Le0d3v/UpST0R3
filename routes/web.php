<?php

use App\Http\Controllers\ProviderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\APIController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportsContoller;
use App\Http\Controllers\StorageController;
use App\Http\Controllers\UsersController;

// Login
Route::get('/', [AuthController::class, "index"])->name("login");
Route::post('/', [AuthController::class, "store"])->name("login.store");
Route::get('/logout', [AdminController::class, "logout"])->name("logout");

// Admin
Route::get('/dashboard', [AdminController::class, "index"])->name("admin");

// Products
Route::get('/dashboard/storage', [StorageController::class, "index"])->name("storage");
Route::get('/dashboard/storage/show/{product}', [StorageController::class, "show"])->name("storage.show");
Route::get('/dashboard/storage/create', [StorageController::class, "create"])->name("storage.create");
Route::post('/dashboard/storage/create', [StorageController::class, "store"])->name("storage.store");
Route::get('/dashboard/storage/edit/{id}', [StorageController::class, "edit"])->name("storage.edit");
Route::put('/dashboard/storage/edit/{id}', [StorageController::class, "update"])->name("storage.update");
Route::delete('/storage/delete/{id}', [StorageController::class, "delete"])->name("storage.delete");
Route::get('api/products', [AdminController::class, "getProducts"])->name("storage.products");
Route::get('api/products', [AdminController::class, "getProducts"])->name("storage.products");


//Reports
Route::get('/dashboard/reports', [ReportsContoller::class, "index"])->name("reports");

// Providers
Route::get('/dashboard/providers', [ProviderController::class, "index"])->name("providers");
Route::get('/dashboard/providers/create', [ProviderController::class, "create"])->name("providers.create");
Route::post('/dashboard/providers/create', [ProviderController::class, "store"])->name("providers.store");
Route::get('/dashboard/providers/edit/{provider}', [ProviderController::class, "edit"])->name("providers.edit");
Route::put('/dashboard/providers/edit/{id}', [ProviderController::class, "update"])->name("providers.update");
Route::delete('/providers/delete/{id}/', [ProviderController::class, "delete"])->name("providers.delete");

// Image
Route::post("/images", [ImageController::class, "store"])->name("image.store");