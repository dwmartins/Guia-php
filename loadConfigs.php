<?php

include "config.php";

// Load the appropriate .env file
try {
    loadEnv();
} catch (Exception $e) {
    die("Failed to load environment: " . $e->getMessage());
}

if(!isCli()) {
    // Set the default language
    loadTranslations();

    // Sets the default time zone
    loadTimeZone();

    session_set_cookie_params([
        'secure' => true,
        'httponly' => true,
        'samesite' => 'Strict'
    ]);

    session_start();
}

/**
 * Loads environment variables from a .env file.
 */
function loadEnv() {
    $envPath = __DIR__ . "/";
    $envFile = file_exists($envPath . '.env.development') ? '.env.development' : '.env';

    if (!file_exists($envPath . $envFile)) {
        throw new Exception("The .env file $envFile does not exist.");
    }

    define("DEV_MODE", $envFile === '.env.development');
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__, $envFile);
    $dotenv->load();
}

/**
 * Loads translations based on the current language setting.
 */
function loadTranslations() {
    $rootPath = realpath(__DIR__);

    $language = getSetting('language') ?? "pt-br";
    define("LANGUAGE", $language);

    $translationFile = $rootPath . "/translations/$language.php";

    if (!file_exists($translationFile)) {
        throw new Exception("The translation file for language $language was not found.");
    }

    include_once  $translationFile;
}

/**
 * Sets the default timezone based on settings.
 */
function loadTimeZone() {
    $timeZone = getSetting('timezone') ?? "America/Sao_Paulo";
    date_default_timezone_set($timeZone);
}

/**
 * Checks if the current execution context is CLI.
 * @return bool True if in CLI mode, false otherwise.
 */
function isCli() {
    return php_sapi_name() === 'cli' || defined('STDIN');
}
