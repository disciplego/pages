<?php

use Illuminate\Support\Facades\Route;

// Pages route
Route::get('/pages', function () {
    return view('dgo::pages');
});
