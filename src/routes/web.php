<?php
Route::group(['middleware' => ['web']], function () {
    Route::resource('settings', 'Rgergo67\LaravelSettings\App\Http\Controllers\SettingController');
});