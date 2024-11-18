<?php

use App\Http\Route;
use App\Middleware\AdminMiddleware;

/**
 * ########################################
 * # ------------- VIEWS -----------------#
 * ########################################
 */
Route::get(PATH_EMAIL_SETTINGS, "App/SettingsController@emailConfigView", [
    [AdminMiddleware::class, 'isAdmin']
]);

Route::get(PATH_ADM_BASIC_INFORMATION, "App/SettingsController@basicInfoView", [
    [AdminMiddleware::class, 'isAdmin']
]);

/**
 * ########################################
 * # ------------- END VIEWS -------------#
 * ########################################
 */

Route::post(PATH_EMAIL_SETTINGS, "App/SettingsController@saveEmailConfig", [
    [AdminMiddleware::class, 'isAdmin']
]);

Route::post("/app/settings/updateimages", "App/SettingsController@setImages", [
    [AdminMiddleware::class, 'isAdmin']
]);

Route::post("/app/settings/basic-infos", "App/SettingsController@saveBasicInfos", [
    [AdminMiddleware::class, 'isAdmin']
]);