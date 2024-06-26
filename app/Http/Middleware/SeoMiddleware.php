<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Support\Seo\Models\Seo;
use Symfony\Component\HttpFoundation\Response;

class SeoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $cacheKey = 'seo_' . str($request->getPathInfo())->slug('_');

        $seo = unserialize(Cache::rememberForever($cacheKey, function () use ($request) {
            return serialize(Seo::query()->where('url', $request->getPathInfo())->first());
        }));

        if ($seo) {
            view()->share('seo_title', $seo->title);
        }

        return $next($request);
    }
}
