<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemInController;
use App\Http\Controllers\ItemOutController;
use App\Http\Controllers\HomeController;
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/items', [ItemController::class, 'index'])->name('items.index');
Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
Route::post('/items', [ItemController::class, 'store'])->name('items.store');

Route::get('item-ins', [ItemInController::class, 'index'])->name('item-ins.index');
Route::get('item-ins/create', [ItemInController::class, 'create'])->name('item-ins.create');
Route::post('item-ins', [ItemInController::class, 'store'])->name('item-ins.store');

Route::get('item-outs', [ItemOutController::class, 'index'])->name('item-outs.index');
Route::get('item-outs/{item:id}/create', [ItemOutController::class, 'create'])->name('item-outs.create', ['item' => 'id']);
Route::post('item-outs', [ItemOutController::class, 'store'])->name('item-outs.store');

