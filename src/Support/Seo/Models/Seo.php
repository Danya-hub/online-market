<?php

namespace Support\Seo\Models;

use App\Casts\SeoUrlCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Seo extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'title',
    ];

    protected $casts = [
        'url' => SeoUrlCast::class,
    ];

    private static function forgetCache(Seo $model): void
    {
        Cache::forget('seo_' . str($model->url)->slug('_'));
    }

    protected static function boot(): void
    {
        parent::boot();

        static::created([static::class, 'forgetCache']);
        static::updated([static::class, 'forgetCache']);
        static::deleted([static::class, 'forgetCache']);
    }
}
