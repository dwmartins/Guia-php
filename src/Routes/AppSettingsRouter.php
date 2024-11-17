<?php

use App\Http\Route;
use App\Middleware\AdminMiddleware;

/**
 * ########################################
 * # ------------- VIEWS -----------------#
 * ########################################
 */
Route::get(PATH_EMAIL_SETTINGS, "AppSettingsController@emailConfigView", [
    [AdminMiddleware::class, 'isAdmin']
]);

Route::get(PATH_ADM_BASIC_INFORMATION, "AppSettingsController@basicInfoView", [
    [AdminMiddleware::class, 'isAdmin']
]);

/**
 * ########################################
 * # ------------- END VIEWS -------------#
 * ########################################
 */

Route::post(PATH_EMAIL_SETTINGS, "AppSettingsController@saveEmailConfig", [
    [AdminMiddleware::class, 'isAdmin']
]);

Route::post("/app/settings/updateimages", "AppSettingsController@setImages", [
    [AdminMiddleware::class, 'isAdmin']
]);

Route::post("/app/settings/basic-infos", "AppSettingsController@saveBasicInfos", [
    [AdminMiddleware::class, 'isAdmin']
]);