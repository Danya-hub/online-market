<?php

namespace Support;

use App\Events\AfterSessionRegenerated;
use Closure;

class SessionRegenerator
{
    public static function run(Closure $callback = null): void
    {
        $old = request()->session()->getId();

        request()->session()->invalidate();

        request()->session()->regenerate();

        if (!is_null($callback)) {
            $callback();
        }

        event(new AfterSessionRegenerated(
            $old,
            request()->session()->getId(),
        ));
    }
}
