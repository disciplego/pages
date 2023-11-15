<?php

namespace Dgo\Pages\Livewire;

use Dgo\ViewHelp\Livewire\BaseComponent;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;


class PageIndex extends BaseComponent
{
    public function render(): Factory|Application|View
    {
        return view($this->customView('dgo::livewire.page-index'));
    }
}