<?php

namespace Dgo\Pages\Middleware;

use Closure;
use Dgo\MarkdownHelp\Facades\MarkdownHelp;
use Dgo\Pages\Livewire\PageIndex;
use Dgo\Pages\Pages;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laravel\Folio\RequestHandler;
use Laravel\Folio\Router;
use Livewire\Livewire;
use Symfony\Component\HttpFoundation\Response;
use function Dgo\Pages\checkForDataPage;

class CheckIndexRoute
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
        if(Str::of($request->path())->basename()->__toString() === config('pages.home_slug'))
        {
            return abort(404);
        }
        return $next($request);
    }


}
