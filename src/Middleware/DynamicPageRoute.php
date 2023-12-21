<?php

namespace Dgo\Pages\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DynamicPageRoute
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $slug = $request->path() === '/' ? 'index' : $request->path();

        // Set the modified slug back into the request
        $request->merge(['slug' => $slug]);

        return $next($request);
    }


}
