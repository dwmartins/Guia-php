<?php

namespace App\Controllers;

use App\Class\EmailConfig;
use App\Http\Request;
use App\Utils\SEOManager;
use App\Validators\EmailSettingsValidator;

class AppSettingsController {

    private $seo;

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
        $data = [];
        $this->seo->setTitle(SEO_TITLE_BASIC_INFORMATION);
        $data["seo"] = $this->seo;

        return [
            "view" => "adminView/basicInformation.php",
            "data" => $data
        ];
    }
}