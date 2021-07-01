<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumsController;
use App\Http\Controllers\PhotosController;




Route::get('/', [AlbumsController::class, 'index'])->name('home');

Route::get('/create/album', [AlbumsController::class, 'create'])->name('create.album');
Route::post('/create/album', [AlbumsController::class, 'store']);

Route::get('/album/{album}', [AlbumsController::class, 'show'])->name('show.album');

Route::get('/create/photo/{album}', [PhotosController::class, 'create'])->name('create.photo');
Route::post('/create/photo', [PhotosController::class, 'store'])->name('upload.photo');

Route::get('/photo/{photo}', [PhotosController::class, 'show'])->name('show.photo');
Route::delete('/photo/{photo}', [PhotosController::class, 'destroy']);
