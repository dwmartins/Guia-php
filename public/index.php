<?php

require_once __DIR__ ."/../vendor/autoload.php";
require_once __DIR__."/../loadConfigs.php";
require_once __DIR__."/../src/Routes/main.php";

use App\Core\Core;
use App\Http\Route;

try {
    ob_start();

    Core::dispatch(Route::routes());

    ob_end_flush();
} catch (\Throwable $e) {
    ob_end_clean();

    logError($e);
    showErrorPage();
}
