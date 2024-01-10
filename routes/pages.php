<?php

use Dgo\Pages\Livewire\PageIndex;
use Illuminate\Support\Facades\Route;
use Laravel\Folio\Folio;
use Laravel\Folio\MountPath;
use Laravel\Folio\RequestHandler;


//Route::middleware(['web'])->group(function () {
//    Route::get('/', PageIndex::class)->name('home');
//    Route::get('/{slug?}', PageIndex::class)
//        ->where('slug', '.*')
//        ->name('page.index');
//
//});