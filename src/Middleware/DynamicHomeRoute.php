<?php

namespace Dgo\Pages\Middleware;

use Closure;
use Dgo\MarkdownHelp\Facades\MarkdownHelp;
use Dgo\Pages\Livewire\PageIndex;
use Dgo\Pages\Pages;
use Illuminate\Http\Request;
use Laravel\Folio\RequestHandler;
use Laravel\Folio\Router;
use Livewire\Livewire;
use Symfony\Component\HttpFoundation\Response;

class DynamicHomeRoute
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response) $next
     * @return Request|Response|null
     */
    public function handle(Request $request, Closure $next): Request|Response|null
    {
        $slug = $request->path() === '/' ? 'index' : $request->path();

        if($page = Pages::slug($slug)->first())
        {

            return Livewire::mount(PageIndex::class, ['page' => $page])->toResponse($request);
        }

        return $next($request);
    }


}
