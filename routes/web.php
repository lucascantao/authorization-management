<?php

use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RotaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(route('user.index'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Perfis
Route::prefix('perfil')->middleware(['auth'])->group(function() {
    Route::get('/', [PerfilController::class, 'index'])->name('perfil.index');
    Route::get('/create', [PerfilController::class, 'create'])->name('perfil.create');
    Route::post('/', [PerfilController::class, 'store'])->name('perfil.store');
    Route::get('/{id}/detail', [PerfilController::class, 'detail'])->name('perfil.detail');
});

//Rotas
Route::prefix('rota')->middleware(['auth'])->group(function() {
    Route::get('/', [RotaController::class, 'index'])->name('rota.index');
    Route::get('/{id}/settings', [RotaController::class, 'settings'])->name('rota.settings');
    Route::get('/{id}/settings/create', [RotaController::class, 'createSettings'])->name('rota.settings.create');
    Route::post('/settings/store', [RotaController::class, 'storeSettings'])->name('rota.settings.store');
});

//Users
Route::prefix('user')->middleware(['auth'])->group(function() {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/{id}/update', [UserController::class, 'update'])->name('user.update');
});


//Produtos
Route::prefix('produto', ProdutosController::class)->middleware(['auth', 'authorization'])->group(function() {
    Route::get('/', [ProdutosController::class, 'index'])->name('produto.index');
    Route::get('/create', [ProdutosController::class, 'create'])->name('produto.create');
    Route::post('/store', [ProdutosController::class, 'store'])->name('produto.store');

    Route::get('/{produto}/show', [ProdutosController::class, 'show'])->name('produto.show');
    Route::get('/{produto}/edit', [ProdutosController::class, 'edit'])->name('produto.edit');
    Route::put('/{produto}/update', [ProdutosController::class, 'update'])->name('produto.update');
    
    Route::get('/{produto}/destroy', [ProdutosController::class, 'destroy'])->name('produto.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
