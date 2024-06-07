<?php

namespace Support;

use Closure;
use Illuminate\Support\Facades\DB;
use Throwable;

class Transaction
{
    /**
     * @throws Throwable
     */
    public static function run(
        Closure $callback,
        Closure $finished = null,
        Closure $onError = null,
    )
    {
        try {
            DB::beginTransaction();

            $a = $callback();

            if (!is_null($finished)) {
                $finished($a);
            }

            DB::commit();

//            return tap($callback, function ($result) use ($finished) {
//                if (!is_null($finished)) {
//                    $finished($result);
//                }
//
//                DB::commit();
//            });
//
            return $a;
        } catch (Throwable $e) {
            DB::rollBack();

            if (!is_null($onError)) {
                $onError($e);
            }

            throw $e;
        }
    }
}
