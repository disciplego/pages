<?php

use Dgo\Pages\Livewire\PageIndex;
use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'dynamic.page.route'])->group(function () {

    Route::get('/', PageIndex::class)
        ->name('home')
        ->middleware('dynamic.page.route');

});

Route::middleware(['web'])->group(function () {

    Route::get('/{slug?}', PageIndex::class)
        ->where('slug', '.*')
        ->name('page.index')
        ->middleware('dynamic.page.route');

});