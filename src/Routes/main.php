<?php

function includeRoutesFromDirectory($directory) {
    $files = scandir($directory);

    foreach ($files as $file) {
        if ($file === '.' || $file === '..' || $file === '.gitignore') {
            continue;
        }

        $filePath = $directory . '/' . $file;

        if (is_dir($filePath)) {
            includeRoutesFromDirectory($filePath);
        } else {
            require_once $filePath;
        }
    }
}

includeRoutesFromDirectory(__DIR__);
