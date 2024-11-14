<?php

use App\Class\SiteInfo;
use App\Utils\FileCache;

/**
 * @return SiteInfo The `SiteInfo` object containing the site information
 */
function getSiteInfo() {
    try {
        $cache = new FileCache();
        $cacheData = $cache->get('site_info');

        $siteInfo = new SiteInfo(!empty($cacheData) ? $cacheData : []);

        if($cacheData) {
            $siteInfo->update($cacheData);
        } else {
            $siteInfo->fetch();
            $cache->set('site_info', $siteInfo->toArray());
        }
        
        return $siteInfo;
    } catch (Exception $e) {
        logError($e);
        throw new Exception("Error fetching Infos from site");
    }
}