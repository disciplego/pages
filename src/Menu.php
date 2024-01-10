<?php

namespace Dgo\Pages;

use Dgo\Pages\MenuItem;
use Dgo\ModelHelp\Traits\HasSlugScope;
use Dgo\ModelHelp\Traits\IsActivatedScope;
use Dgo\Pages\Traits\Pageable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Menu extends Model
{
    use SoftDeletes, HasFactory, Pageable, IsActivatedScope, HasSlug, HasSlugScope;

    protected $fillable = [
        'title',
        'slug',
        'location',
        'is_activated',
    ];

    protected $casts = [
        'is_activated' => 'boolean',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }

    /**
     * Get the items for the menu.
     */
    public function items(): BelongsToMany
    {
        return $this->belongsToMany(MenuItem::class);
    }
}
