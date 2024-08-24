<?php

function showIco() {
    $siteInfo = getSiteInfo();
    $ico = empty($siteInfo->getIco()) ? "/assets/img/default/defaultIco.ico" : "/uploads/systemImages/" . $siteInfo->getIco(); 
    return $ico;
}