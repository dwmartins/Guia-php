<?php

namespace App\Utils;

class FileCache {
    private $cacheDir;
    private $defaultExpiration; // 604800 7 days

    public function __construct($cacheDir = 'cache', $defaultExpiration = 604800) {
        $rootPath = realpath(__DIR__ . '/../../');
        $this->cacheDir = $rootPath . '/' . $cacheDir;
        $this->defaultExpiration = $defaultExpiration;

        if (!is_dir($this->cacheDir)) {
            mkdir($this->cacheDir, 0755, true);
        }
    }

    private function getCacheFilePath($cacheKey) {
        // Sanitize the cacheKey to make it a safe filename
        $safeCacheKey = preg_replace('/[^A-Za-z0-9_\-]/', '_', $cacheKey);
        return $this->cacheDir . '/' . $safeCacheKey . '.cache';
    }

    public function get($cacheKey) {
        $cacheFile = $this->getCacheFilePath($cacheKey);

        if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < $this->defaultExpiration) {
            $cache = file_get_contents($cacheFile);
            return json_decode($cache, true);
        }

        return false;
    }

    public function set($cacheKey, $data) {
        $cacheFile = $this->getCacheFilePath($cacheKey);
        file_put_contents($cacheFile, json_encode($data));
    }

    public function delete($cacheKey) {
        $cacheFile = $this->getCacheFilePath($cacheKey);

        if (file_exists($cacheFile)) {
            unlink($cacheFile);
        }
    }

    public function clear() {
        foreach (glob($this->cacheDir . '/' . '*.cache') as $file) {
            unlink($file);
        }
    }
}
