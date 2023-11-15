<?php

namespace Dgo\Pages\Services;

use Dgo\Pages\Contracts\PagesRepositoryInterface;

class PagesService
{
    protected PagesRepositoryInterface $pageRepository;

    public function __construct(PagesRepositoryInterface $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    public function loadPageModel(string $slug)
    {
        return $this->pageRepository->getPageBySlug($slug);
    }
}
