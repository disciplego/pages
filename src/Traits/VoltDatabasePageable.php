<?php

namespace Dgo\Pages\Traits;

use Dgo\Pages\Pages;
use Illuminate\View\View;
use function Laravel\Folio\{render};
trait VoltDatabasePageable
{
    public function checkForDataPage(): \Laravel\Folio\Options\PageOptions
    {
        return render(function (View $view, Pages $pages) {
            $slug = \Illuminate\Support\Facades\Route::getCurrentRequest()->getRequestUri();

            if($slug === '/') {
                $slug = config('pages.home_slug') ?? 'index';
            }
            if($page = Pages::query()->whereSlug($slug)->first()) {

                return view('dgo::livewire.page-index', [
                    'page' => $page,
                    'fromFolio' => true,
                ]);
            }
        });
    }
}