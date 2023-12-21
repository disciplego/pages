<?php

use Dgo\Pages\Livewire\PageIndex;
use Illuminate\Support\Facades\Route;

Route::middleware(['web'])->group(function () {

    Route::get('/{slug?}', PageIndex::class)
        ->where('slug', '.*')
        ->name('page.index')
        ->middleware('dynamic.page.route');

});