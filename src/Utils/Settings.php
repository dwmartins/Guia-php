<?php

use App\Class\Settings;
use App\Models\SettingsDAO;

function getSetting(string $name) {
    try {
        $setting = SettingsDAO::fetchByName($name);
        return $setting['value'] ?: [];
    } catch (Exception $e) {
        logError($e);
        throw new Exception("Error fetching setting");
    }
}

function getAllSettings() {
    try {
        return SettingsDAO::fetch();
    } catch (Exception $e) {
        logError($e);
        throw new Exception("Error fetching settings");
    }
}

function updateSetting($name, $newValue) {
    try {
        $setting = new Settings();

        $values = [
            "name" => $name,
            "value" => $newValue
        ];

        $setting->update($values);

    } catch (Exception $e) {
        logError($e);
        throw new Exception("Error updating settings");
    }
}