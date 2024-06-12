<?php

namespace App\Http\Middleware;

use Closure;
use Domain\Localization\Contracts\ChangeLocaleContract;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class LocalizationMiddleware
{
    public function __construct(public ChangeLocaleContract $changeLocale)
    {
    }

    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $fallbackLocale = config('app.fallback_locale');

        if (
            !$request->isMethod('get')
            || !Str::contains(Route::getCurrentRoute()->getName(), '.page')
            || $request->is(session()->get('locale', $fallbackLocale) . '/*')
        ) {
            return $next($request);
        }

        $userLocale = $request->segment(1);
        $sessionLocale = session()->get('locale');
        $locales = config('langs');

        if (!is_null($sessionLocale) && $userLocale !== $sessionLocale) {
            ($this->changeLocale)($sessionLocale);

            return $this->redirectWithLocale($request, $sessionLocale);
        }

        if (in_array($userLocale, $locales)) {
            ($this->changeLocale)($userLocale);

            return $next($request);
        }

        ($this->changeLocale)($fallbackLocale);

        return $this->redirectWithLocale($request, $fallbackLocale);
    }

    private function redirectWithLocale(Request $request, string $locale): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $segments = $request->segments();

        array_shift($segments);

        return redirect($locale . '/' . implode('/', $segments));
    }
}
