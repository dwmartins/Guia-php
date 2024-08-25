<?php

function showIco() {
    $siteInfo = SITE_INFO;
    $ico = empty($siteInfo->getIco()) ? "/assets/img/default/defaultIco.ico" : "/uploads/systemImages/" . $siteInfo->getIco(); 
    return $ico;
}