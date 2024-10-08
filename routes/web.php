<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Comercio\Ubicaciones;
use App\Livewire\Counter;
use App\Livewire\Comercio\ComercioMapa;

Route::get('/', function () {
    return view('admin.index');
});

Route::get('counter', Counter::class)->name('counter');
// Route::get('ubicaciones', Ubicaciones::class)->name('ubicaciones');
Route::get('mapas', ComercioMapa::class)->name('mapas');
