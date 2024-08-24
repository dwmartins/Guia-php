<?php

use App\Class\SiteInfo;

/**
 * @return SiteInfo The `SiteInfo` object containing the site information
 */
function getSiteInfo() {
    try {
        $siteInfo = new SiteInfo();
        $siteInfo->fetch();
        
        return $siteInfo;
    } catch (Exception $e) {
        logError($e);
        throw new Exception("Error fetching Infos from site");
    }
}