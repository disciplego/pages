<?php

namespace Dgo\Pages\Traits;

use Dgo\ModelHelp\Traits\HasTitleIdentifier;
use Dgo\Pages\MenuItem;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait Menuable
{
    use HasTitleIdentifier;


    public function item(): MorphOne
    {

        return $this->morphOne(MenuItem::class, 'menuable', 'menuable_type', 'menuable_id');
    }
}