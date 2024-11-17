<?php

namespace App\Controllers;

use App\Class\EmailConfig;
use App\Class\SiteInfo;
use App\Http\Request;
use App\Utils\FileCache;
use App\Utils\SEOManager;
use App\Utils\UploadFile;
use App\Validators\EmailSettingsValidator;
use App\Validators\FileValidators;

class AppSettingsController {

    private $seo;
    private string $siteInfoImagesFolder = "systemImages";

    public function __construct() {
        $this->seo = new SEOManager;
    }

    /**
     * @return View "adminView/emailSettings.php"
     */
    public function emailConfigView(Request $request, $params) {
        $data = [];
        $this->seo->setTitle(SEO_TITLE_EMAIL_SETTINGS);
        $data["seo"] = $this->seo;

        $emailConfig = new EmailConfig($data);
        $emailConfig->fetch();
        $data["emailConfig"] = $emailConfig;

        $data['emailActive'] = getSetting("emailSending") === "on" ? true : false;

        return [
            "view" => "adminView/emailSettings.php",
            "data" => $data
        ];
    }

    public function saveEmailConfig(Request $request, $params) {
        try {
            $data = $request->body();

            $fieldsValid = EmailSettingsValidator::create($data);

            if(!$fieldsValid['isValid']) {
                redirectWithMessage(PATH_EMAIL_SETTINGS, 'error', $fieldsValid['message'], $data);
            }

            $emailConfig = new EmailConfig($data);
            $emailConfig->fetch();

            if(!empty($emailConfig->getId())) {
                $emailConfig->update($data);
            }

            isset($data['emailActive']) ? updateSetting("emailSending", "on") : updateSetting("emailSending", "off");

            $emailConfig->save();

            redirectWithMessage(PATH_EMAIL_SETTINGS, 'success', SETTINGS_SAVED_SUCCESSFULLY);
        } catch (\Exception $e) {
            logError($e->getMessage());
            redirectWithMessage(PATH_EMAIL_SETTINGS, "error", FATAL_ERROR);
        }
    }

    /**
     * @return View "adminView/basicInformation.php"
     */
    public function basicInfoView(Request $request, $params) {
        $siteInfo = SITE_INFO;
        $data = [];

        $this->seo->setTitle(SEO_TITLE_BASIC_INFORMATION);
        $data["seo"] = $this->seo;

        $data['logoImage'] = empty($siteInfo->getLogoImage()) ? PATH_DEFAULT_LOGO : ROOT_UPLOADS_SYSTEMIMAGES . $siteInfo->getLogoImage() . "?v=" . time();
        $data['coverImage'] = empty($siteInfo->getCoverImage()) ? ROOT_DEFAULT_COVER : ROOT_UPLOADS_SYSTEMIMAGES . $siteInfo->getCoverImage() . "?v=" . time();
        $data['icon'] = empty($siteInfo->getIco()) ? PATH_DEFAULT_ICON : ROOT_UPLOADS_SYSTEMIMAGES . $siteInfo->getIco() . "?v=" . time();
        $data['defaultImage'] = empty($siteInfo->getDefaultImage()) ? ROOT_DEFAULT_IMAGE : ROOT_UPLOADS_SYSTEMIMAGES . $siteInfo->getDefaultImage() . "?v=" . time();

        return [
            "view" => "adminView/basicInformation.php",
            "data" => $data
        ];
    }

    public function setImages(Request $request, $params) {
        try {
            $requestFiles = $request->files();

            $files = [
                "logo" => !empty($requestFiles["logo"]) ? $requestFiles["logo"] : null,
                "cover" => !empty($requestFiles["cover"]) ? $requestFiles["cover"] : null,
                "icon" => !empty($requestFiles["icon"]) ? $requestFiles["icon"] : null,
                "default" => !empty($requestFiles["default"]) ? $requestFiles["default"] : null
            ];

            $siteInfo = SITE_INFO;

            foreach ($files as $key => $file) {
                if(empty($file)) {
                    continue;
                }

                if($key == "icon") {
                    $fileData = FileValidators::validIcon($file);
                } else {
                    $fileData = FileValidators::validImage($file);
                }

                if(isset($fileData["invalid"])) {
                    redirectWithMessage(PATH_ADM_BASIC_INFORMATION, 'error', $fileData["invalid"]);
                }

                $fileName = $key . "." . $fileData["mimeType"];

                switch ($key) {
                    case "logo":
                        if(!empty($siteInfo->getLogoImage())) {
                            UploadFile::removeFile($siteInfo->getLogoImage(), $this->siteInfoImagesFolder);
                        }

                        $siteInfo->setLogoImage($fileName);
                        break;
                    case "cover":
                        if(!empty($siteInfo->getCoverImage())) {
                            UploadFile::removeFile($siteInfo->getCoverImage(), $this->siteInfoImagesFolder);
                        }

                        $siteInfo->setCoverImage($fileName);
                        break;
                    case "default":
                        if(!empty($siteInfo->getDefaultImage())) {
                            UploadFile::removeFile($siteInfo->getDefaultImage(), $this->siteInfoImagesFolder);
                        }

                        $siteInfo->setDefaultImage($fileName);
                        break;
                    case "icon":
                        if(!empty($siteInfo->getIco())) {
                            UploadFile::removeFile($siteInfo->getIco(), $this->siteInfoImagesFolder);
                        }

                        $siteInfo->setIco($fileName);
                        break;
                    default:
                        break;
                }

                UploadFile::uploadFile($file, $this->siteInfoImagesFolder, $fileName);
            }

            $siteInfo->save();

            $cache = new FileCache();
            $cache->set('site_info', $siteInfo->toArray());

            redirectWithMessage(PATH_ADM_BASIC_INFORMATION, "success", UPDATED_IMAGES);
        } catch (\Exception $e) {
            logError($e->getMessage());
            redirectWithMessage(PATH_ADM_BASIC_INFORMATION, "error", FATAL_ERROR);
        }
    }
}