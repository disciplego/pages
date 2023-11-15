<?php

namespace Dgo\Pages\Facades;

use Illuminate\Support\Facades\Facade;

class Pages extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'pages';
    }
}
