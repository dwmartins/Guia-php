<?php

use App\Class\SiteInfo;

function getSiteInfo() {
    try {
        $siteInfo = new SiteInfo();
        $siteInfo->fetch();
        
        return $siteInfo ?? null;
    } catch (Exception $e) {
        logError($e);
        throw new Exception("Error fetching Infos from site");
    }
}