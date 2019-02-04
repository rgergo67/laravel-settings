<?php
if (!function_exists('setting')) {
    /**
     * Get / set the specified setting value.
     *
     * If an array is passed as the key, we will assume you want to set an array of values.
     *
     * @param  string  $key
     * @return mixed
     */
    function setting($key = null)
    {
        $setting = app('setting');

        if (is_null($key)) {
            return $setting;
        }

        return $setting->get($key);
    }
}