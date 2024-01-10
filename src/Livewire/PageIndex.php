<?php

namespace Dgo\Pages\Livewire;

use Dgo\Pages\Pages;
use Dgo\ViewHelp\Livewire\BaseComponent;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;


class PageIndex extends BaseComponent
{

    public $slug;
    public $page;
    public function mount($slug = null)
    {
            $this->slug = $slug ?? config('pages.home_slug') ?? 'home';
            $this->page = $this->findActivatedPage($this->slug);
    }
    public function render(): Factory|Application|View
    {

        return view($this->customView('dgo::livewire.page-index'))
            ->layout($this->customView('dgo::layouts.app'));
    }

    public function findActivatedPage($slug)
    {
        return Pages::query()->whereSlug($slug)->first();
    }
}