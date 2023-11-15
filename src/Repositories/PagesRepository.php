<?php

namespace Dgo\Pages\Repositories;

use Carbon\Carbon;
use Dgo\MarkdownHelp\Facades\MarkdownHelp;
use Dgo\Pages\Contracts\PagesRepositoryInterface;
use Dgo\Pages\Pages;

class PagesRepository implements PagesRepositoryInterface
{
    public function getPageAndMarkdownBySlug(string $slug): ?array
    {
        $page = Pages::where('slug', $slug)->first();

        if ($page) {
            $markdown = null;
            if (isset($page->settings['markdown_file']) && $page->settings['use_markdown']) {
                $markdown = MarkdownHelp::getRenderedMarkdownFromFile(
                    resource_path('markdown/' . $page->settings['markdown_file'])
                );
            }
            $page->published_at = $this->getPublishedAt($page, $markdown);

            return [
                'page' => $page,
                'markdown' => $markdown,
            ];
        }

        return null;
    }

    public function getMarkdownBySlug(string $slug)
    {
        // Logic to fetch Markdown by slug
    }

    public function getMarkdownIndexAndTocBySlug(string $slug)
    {
        // Logic to fetch Markdown index and TOC by slug
    }

    public function getPublishedAt($page, $markdown): ?Carbon
    {
        if ($page->published_at && isset($markdown->matter['published_at'])) {
            return Carbon::make($markdown->matter['published_at']);
        }
        return Carbon::make($page->published_at);
    }

}