<?php

namespace Dgo\Pages\Traits;

use Dgo\ModelHelp\Traits\HasTitleIdentifier;
use Dgo\Pages\Pages;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait Pageable
{

    use HasTitleIdentifier;

    public function page(): MorphOne
    {
        return $this->morphOne(Pages::class, 'pageable');
    }


    public function modelSlug(): Attribute
    {
        $slug = strtolower(class_basename($this));

        return Attribute::make(
            get: fn ($value) => $slug,
            set: fn ($value) => $slug,
        );
    }
}
