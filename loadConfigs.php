<?php

include "config.php";

// Load the appropriate .env file
loadEnv();

if(!isCli()) {
    // Set the default language
    loadTranslations();

    // Sets the default time zone
    loadTimeZone();
}

function loadEnv() {
    $envPath = __DIR__ . "/";
    $env = "";

    if (file_exists($envPath . '.env.development')) {
        define("DEV_MODE", true);
        $env = '.env.development';
    } else {
        define("DEV_MODE", false);
        $env = '.env';
    }


    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__, $env);
    $dotenv->load();
}

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

function loadTimeZone() {
    $timeZone = getSetting('timezone') ?? "America/Sao_Paulo";
    date_default_timezone_set($timeZone);
}

function isCli() {
    return php_sapi_name() === 'cli' || defined('STDIN');
}
