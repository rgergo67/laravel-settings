<?php
Route::group(['middleware' => ['web']], function () {
    Route::resource('settings', 'Rgergo67\Laravel\Settings\App\Http\Controllers\SettingController')
        ->except(['create', 'destroy']);
    Route::resource('settings-admin', 'Rgergo67\Laravel\Settings\App\Http\Controllers\AdminSettingController')
        ->except(['show'])
        ->parameters([
            'settings-admin' => 'setting'
        ]);
});