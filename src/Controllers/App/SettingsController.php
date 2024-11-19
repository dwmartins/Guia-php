<?php

namespace App\Controllers\App;

use App\Class\EmailConfig;
use App\Class\SiteInfo;
use App\Http\Request;
use App\Utils\FileCache;
use App\Utils\SEOManager;
use App\Utils\UploadFile;
use App\Utils\View;
use App\Validators\EmailSettingsValidator;
use App\Validators\FileValidators;
use App\Validators\SiteInfoValidator;

class SettingsController {

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

        View::render("adminView/emailSettings.php", $data);
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

        $data['logoImage'] = empty($siteInfo->getLogoImage()) ? PATH_DEFAULT_LOGO : PATH_UPLOADS_SYSTEMIMAGES . $siteInfo->getLogoImage() . "?v=" . time();
        $data['coverImage'] = empty($siteInfo->getCoverImage()) ? PATH_DEFAULT_COVER : PATH_UPLOADS_SYSTEMIMAGES . $siteInfo->getCoverImage() . "?v=" . time();
        $data['icon'] = empty($siteInfo->getIco()) ? PATH_DEFAULT_ICON : PATH_UPLOADS_SYSTEMIMAGES . $siteInfo->getIco() . "?v=" . time();
        $data['defaultImage'] = empty($siteInfo->getDefaultImage()) ? PATH_DEFAULT_IMAGE : PATH_UPLOADS_SYSTEMIMAGES . $siteInfo->getDefaultImage() . "?v=" . time();
        $data['siteInfo'] = $siteInfo;

        View::render("adminView/basicInformation.php", $data);
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

    public function saveBasicInfos(Request $request, $params) {
        try {
            $requestData = $request->body();

            $fieldsValid = SiteInfoValidator::create($requestData);

            if(!$fieldsValid['isValid']) {
                redirectWithMessage(PATH_ADM_BASIC_INFORMATION, 'error', $fieldsValid['message']);
            }

            $siteInfo = SITE_INFO;

            if(!empty($siteInfo->getId())) {
                $siteInfo->update($requestData);
            }

            $siteInfo->save();

            $cache = new FileCache();
            $cache->set('site_info', $siteInfo->toArray());

            redirectWithMessage(PATH_ADM_BASIC_INFORMATION, "success", SAVED_WEBSITE_INFORMATION);

        } catch (\Exception $e) {
            logError($e->getMessage());
            redirectWithMessage(PATH_ADM_BASIC_INFORMATION, "error", FATAL_ERROR);
        }
    }

    /**
     * @return View "adminView/basicInformation.php"
     */
    public function cssEditorView(Request $request, $params) {
        $data = [];

        $this->seo->setTitle(SEO_TITLE_CSS_EDITOR);
        $data["seo"] = $this->seo;

        $data['css_editor'] = getSetting("css_editor");

        View::render("adminView/settings/cssEditor.php", $data);
    }

    public function cssEditorSubmit(Request $request, $params) {
        try {
            $body = $request->body();

            if(isset($body['codeEditor'])) {
                updateSetting("css_editor", $body['codeEditor']);

                $cssFilePath = ROOT_PATH . "/public/assets/css/custom.css";
                $content = getSetting("css_editor");

                file_put_contents($cssFilePath, $content);
            }

            redirectWithMessage(PATH_ADM_CSS_EDITOR, "success", CSS_EDITOR_SAVED);
        } catch (\Exception $e) {
            logError($e->getMessage());
            redirectWithMessage(PATH_ADM_CSS_EDITOR, "error", FATAL_ERROR);
        }
    }
}