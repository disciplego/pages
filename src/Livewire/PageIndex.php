<?php

namespace Dgo\Pages\Livewire;

use Dgo\ViewHelp\Livewire\BaseComponent;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;


class PageIndex extends BaseComponent
{

    public function mount($slug = null)
    {
        if(! $slug)
        {
            $slug = config('pages.home_slug') ?? 'index';

            return abort(404);
        }
        $this->slug = $slug;
    }
    public function render(): Factory|Application|View
    {
        return view($this->customView('dgo::livewire.page-index'))
            ->layout($this->customView('dgo::layouts.app'));
    }
}