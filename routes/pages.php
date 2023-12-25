<?php

use Dgo\Pages\Livewire\PageIndex;
use Illuminate\Support\Facades\Route;
use Laravel\Folio\Folio;

Route::middleware(['web'])->group(function () {

    Route::get('/', PageIndex::class)
        ->name('home');
});


//Route::middleware(['web'])->group(function () {
//
//    Route::get('/{slug?}', PageIndex::class)
//        ->where('slug', '.*')
//        ->name('page.index');
//
//});