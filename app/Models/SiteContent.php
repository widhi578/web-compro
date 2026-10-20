<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;

class SiteContent extends Model
{
    protected $primaryKey = 'key';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = ['key', 'value'];

    public static function value(string $key): string
    {
        $default = (string) (config('cms.defaults')[$key] ?? '');

        if (! Schema::hasTable((new static)->getTable())) {
            return $default;
        }

        return Cache::remember(
            "site-content.{$key}",
            now()->addDay(),
            fn () => static::query()->whereKey($key)->value('value')
                ?? $default
        );
    }

    protected static function booted(): void
    {
        static::saved(fn (self $content) => Cache::forget("site-content.{$content->key}"));
    }
}
