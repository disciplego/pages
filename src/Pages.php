<?php

namespace Dgo\Pages;

use Dgo\MarkdownHelp\Facades\MarkdownHelp;
use Dgo\ModelHelp\Traits\Childable;
use Dgo\ModelHelp\Traits\HasSlugScope;
use Dgo\ModelHelp\Traits\IsPublishedScope;
use Dgo\Pages\Traits\Pageable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Pages extends Model
{
    use HasFactory;
    use SoftDeletes;
    use IsPublishedScope;
    use HasSlug;
    use HasSlugScope;
    use Childable;
    use Pageable;
//    use Menuable;
    use HasSEO;

    protected $table = 'pages';

    protected $guarded = ['id'];

    protected $casts = [
        'settings' => 'array',
        'details' => 'array',
        'blocks' => 'array',
        'published_at' => 'date',
        'unpublished_at' => 'date',
        'is_activated' => 'boolean',
        'parent_id' => 'integer',
        'author_id' => 'integer',
        'pageable_id' => 'integer',
        'featured_image_id' => 'integer',
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

    public function author_id(): BelongsTo
    {
        return $this->belongsTo(config('pages.author_model'));
    }

//    public static function boot()
//    {
//        parent::boot();
//
//        static::creating(function ($page) {
//
//            PageUpdateEvent::dispatch($page);
//        });
//
//        static::updating(function ($page) {
//
//            PageUpdateEvent::dispatch($page);
//        });
//    }

    public function setTitleMarkdownAttribute($value)
    {
        if (! $value) {
            $value = $this->attributes['title'];
        }
        $this->attributes['title_markdown'] = $value;
        $this->attributes['title'] = MarkdownHelp::stripMarkdown($value);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = MarkdownHelp::stripMarkdown($value);
    }

    public function pageable(): MorphTo
    {
        return $this->morphTo('pageable', 'pageable_type', 'pageable_id');
    }
}