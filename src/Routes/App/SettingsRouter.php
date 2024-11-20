<?php

use App\Http\Route;
use App\Middleware\AdminMiddleware;

Route::get(PATH_EMAIL_SETTINGS, "App/SettingsController@emailConfigView", [
    [AdminMiddleware::class, 'isAdmin']
]);

Route::get(PATH_ADM_BASIC_INFORMATION, "App/SettingsController@basicInfoView", [
    [AdminMiddleware::class, 'isAdmin']
]);

Route::get(PATH_ADM_CSS_EDITOR, "App/SettingsController@cssEditorView", [
    [AdminMiddleware::class, 'isAdmin']
]);

Route::get(PATH_ADM_GENERAL_SETTINGS, "App/SettingsController@generalSettingsView", [
    [AdminMiddleware::class, 'isAdmin']
]);

// ***********END VIEWS *************//

Route::post("/app/settings/email-settings", "App/SettingsController@saveEmailConfig", [
    [AdminMiddleware::class, 'isAdmin']
]);

Route::post("/app/settings/updateimages", "App/SettingsController@setImages", [
    [AdminMiddleware::class, 'isAdmin']
]);

Route::post("/app/settings/basic-infos", "App/SettingsController@saveBasicInfos", [
    [AdminMiddleware::class, 'isAdmin']
]);

Route::post("/app/settings/css_editor", "App/SettingsController@cssEditorSubmit",[
    [AdminMiddleware::class, 'isAdmin']
]);