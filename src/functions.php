<?php

namespace Dgo\Pages;

use Dgo\Pages\Pages;
use Illuminate\View\View;
use function Laravel\Folio\{render};

function checkForDataPage(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|null
{

    $slug = \Illuminate\Support\Facades\Route::getCurrentRequest()->getRequestUri();

    if ($slug === '/') {
        $slug = config('pages.home_slug') ?? 'index';
    }
    if ($page = Pages::query()->whereSlug($slug)->first()) {

        return view('dgo::livewire.page-index', [
            'page' => $page,
            'fromFolio' => true,
        ]);
    };

return null;
}