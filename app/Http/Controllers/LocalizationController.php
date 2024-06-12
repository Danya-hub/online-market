<?php

namespace App\Http\Controllers;

use Domain\Localization\Contracts\ChangeLocaleContract;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    public function handle(Request $request, $locale, ChangeLocaleContract $changeLocale): RedirectResponse
    {
        if (in_array($locale, config('langs'))) {
            ($changeLocale)($locale);
        }

        return redirect()->back();
    }
}
