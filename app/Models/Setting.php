<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    protected $fillable = ['key', 'value'];

    public const DEFAULTS = [
        'whatsapp' => '5591999999999',
        'phone_display' => '(91) 9 9999-9999',
        'email' => 'daisy@daisyvanevieira.com.br',
        'instagram' => 'https://instagram.com',
        'facebook' => 'https://facebook.com',
    ];

    public static function getValue(string $key, ?string $default = null): string
    {
        $settings = static::map();

        return $settings[$key] ?? $default ?? (static::DEFAULTS[$key] ?? '');
    }

    public static function map(): array
    {
        try {
            return Cache::remember('site_settings', 60, function () {
                $stored = static::query()->pluck('value', 'key')->all();

                return array_merge(static::DEFAULTS, $stored);
            });
        } catch (\Throwable) {
            return static::DEFAULTS;
        }
    }

    public static function putMany(array $values): void
    {
        foreach ($values as $key => $value) {
            static::query()->updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        Cache::forget('site_settings');
    }

    public static function whatsappUrl(?string $message = null): string
    {
        $number = preg_replace('/\D+/', '', static::getValue('whatsapp')) ?: '5591999999999';
        $url = 'https://wa.me/'.$number;

        return $message ? $url.'?text='.rawurlencode($message) : $url;
    }
}
