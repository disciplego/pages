<?php

namespace Dgo\Pages\Middleware;

use Closure;
use Dgo\MarkdownHelp\Facades\MarkdownHelp;
use Illuminate\Http\Request;
use Laravel\Folio\RequestHandler;
use Laravel\Folio\Router;
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

        if($request->path() === '/')
        {
            if(MarkdownHelp::getMarkdownPageContentFromSlug(config('pages.home_slug') ?? 'index')) {

                return $next($request);
            }

        }
        return $request;
    }


}
