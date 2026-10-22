<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PropertyController as AdminPropertyController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/imoveis', [PropertyController::class, 'index'])->name('properties.index');
Route::get('/imoveis/{property:slug}', [PropertyController::class, 'show'])->name('properties.show');
Route::get('/comprar', fn () => redirect()->route('properties.index', ['offer' => 'venda']))->name('buy');
Route::get('/alugar', fn () => redirect()->route('properties.index', ['offer' => 'aluguel']))->name('rent');
Route::get('/sobre', [PageController::class, 'about'])->name('about');
Route::get('/contato', [PageController::class, 'contact'])->name('contact');
Route::post('/contato', [PageController::class, 'submitContact'])->name('contact.store');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});

Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::resource('properties', AdminPropertyController::class)->except('show');
    Route::get('configuracoes', [SettingController::class, 'edit'])->name('settings.edit');
    Route::put('configuracoes', [SettingController::class, 'update'])->name('settings.update');
});
