<?php

namespace Dgo\Pages\Contracts;

interface PagesRepositoryInterface
{
    public function getPageAndMarkdownBySlug(string $slug);
    public function getMarkdownBySlug(string $slug);
    public function getMarkdownIndexAndTocBySlug(string $slug);
    public function getPublishedAt($page, $markdown);
}
