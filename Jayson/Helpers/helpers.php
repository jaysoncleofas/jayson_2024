<?php

use Spatie\Valuestore\Valuestore;

if (! function_exists('get_setting')) {
    function get_setting(string $key, string $default = null)
    {
        $settings = Valuestore::make(storage_path('app/settings.json'));
        $value = $settings->get($key);
        // get file name
        if (is_array($value)) {
            return array_values($value)[0] ?? $default;
        }
        return $value ?? $default;
    }
}