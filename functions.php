<?php

namespace Dgo\Pages;

use Illuminate\View\View;
use function Laravel\Folio\{render};

function checkForDataPage()
{
    $slug = compileSlug();

    if ($page = Pages::query()->whereSlug($slug)->published()->first()) {

        return view('dgo::livewire.page-index', [
            'page' => $page,
            'fromFolio' => true,
        ]);
    }

    return null;

}

function compileSlug(): string
{
    $slug = \Illuminate\Support\Facades\Route::getCurrentRequest()->getRequestUri();

    if ($slug === '/') {
        $slug = config('pages.home_slug') ?? 'index';
    }
    return trim($slug, '/');
}


function isPageActive($page): bool
{
    $slug = compileSlug();
    if ($page->slug === $slug) {
        return true;
    }
    return false;
}