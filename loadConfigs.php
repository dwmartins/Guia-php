<?php

include "config.php";
// Load the appropriate .env file
loadEnv();

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