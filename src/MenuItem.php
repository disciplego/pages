<?php

namespace Dgo\Pages;

use Dgo\ModelHelp\Traits\Childable;
use Dgo\ModelHelp\Traits\HasSlugScope;
use Dgo\ModelHelp\Traits\IsActivatedScope;
use Dgo\ModelHelp\Traits\IsPublishedScope;
use Dgo\Pages\Menu;
use Dgo\Pages\Traits\Pageable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class MenuItem extends Model implements Sortable
{
    use SoftDeletes, HasFactory, SortableTrait, IsPublishedScope, IsActivatedScope, HasSlug, HasSlugScope, Pageable, Childable;

    protected $fillable = [
        'title',
        'abbreviation',
        'slug',
        'icon',
        'url',
        'route',
        'target',
        'help_text',
        'published_at',
        'unpublished_at',
        'is_activated',
        'parent_id',
        'menuable_id',
        'menuable_type',
        'order_column',
    ];

    protected $casts = [
        'published_at' => 'date',
        'unpublished_at' => 'date',
        'is_activated' => 'boolean'
    ];

    /**
     * Get the item url or route if set.
     */
    protected function url(): Attribute
    {
        return Attribute::make(
            get: function (?string $value) {
//                dd($this->menuable);
                if ($this->relationLoaded('menuable')) {

                    return $this->menuable->slug;
                }
                return $this->route ? route($this->route) : $value;
            }
        );
    }

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
     * Get the menu for the items.
     */
    public function menus(): BelongsToMany
    {
        return $this->belongsToMany(Menu::class);
    }

    public function menuable(): MorphTo
    {
        return $this->morphTo(__FUNCTION__, 'menuable_type', 'menuable_id');
    }
}
