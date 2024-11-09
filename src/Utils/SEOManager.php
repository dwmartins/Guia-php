<?php

namespace App\Utils;

class SEOManager {
    private $siteInfo;
    private $title = "";
    private $description = "";
    private $keywords = "";

    public function __construct() {
        $this->siteInfo = SITE_INFO;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getTitleTag() {
        $default = $this->siteInfo->getWebSiteName();
        $title = !empty($this->title) ? $this->title : $default;
        
        return "<title>" . htmlspecialchars($title, ENT_QUOTES, 'UTF-8') . "</title>";
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getDescriptionTag() {
        $default = $this->siteInfo->getDescription();
        $description = !empty($this->description) ? $this->description : $default;

        return '<meta name="description" content="' . htmlspecialchars($description, ENT_QUOTES, 'UTF-8') . '">';
    }

    public function setKeywords($keywords) {
        $this->keywords = $keywords;
    }

    public function getKeywordsTag() {
        $default = $this->siteInfo->getDescription();
        $keywords = !empty($this->keywords) ? $this->keywords : $default;

        return '<meta name="keywords" content="' . htmlspecialchars($keywords, ENT_QUOTES, 'UTF-8') . '">';
    }

    public function getIconTag() {
        $icon = empty($this->siteInfo->getIco()) ? "/assets/img/default/defaultIco.ico" : "/uploads/systemImages/" . $this->siteInfo->getIco();
        return '<link rel="icon" href="'. $icon .'" type="image/x-icon">';
    }
}

