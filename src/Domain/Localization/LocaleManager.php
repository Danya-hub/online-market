<?php

namespace Domain\Localization;

use Domain\Localization\Models\Locale;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class LocaleManager
{
    public function getTranslation(string $key, string $userLocale): Model|Builder|null
    {
        [$group, $key] = explode('.', $key);

        return Cache::rememberForever(
            'locale_' . $group . '_' . $userLocale,
            function () use ($group, $key, $userLocale) {
                return Locale::query()
                    ->where([
                        'group' => $group,
                        'key' => $key,
                        'lang' => $userLocale,
                    ])->first();
            });
    }
}
