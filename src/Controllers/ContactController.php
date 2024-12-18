<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;
use App\Utils\SEOManager;
use App\Utils\View;
use App\Validators\ContactValidator;

class ContactController {

    private $seo;

    public function __construct() {
        $this->seo = new SEOManager;
    }

    /**
     * @return View "publicView/contact.php"
     */
    public function index(Request $request, $params) {
        $siteInfo = SITE_INFO;

        $seoTitle = !empty($siteInfo->getWebSiteName()) ? CONTACT . ' | ' . $siteInfo->getWebSiteName() : CONTACT;
        $this->seo->setTitle($seoTitle);

        View::render("publicView/contact.php", ["seo" => $this->seo]);
    }

    /**
     * @return Response
     */
    public function send(Request $request, $params) {
        try {
            $body = $request->body();

            $fieldsValid = ContactValidator::send($body);

            if(!$fieldsValid['isValid']) {
                return Response::json([
                    "message" => $fieldsValid['message']
                ], 400);
            }

            return Response::json([
                "message" => MESSAGE_SEND_SUCCESSFULLY
            ]);
        } catch (\Exception $e) {
            logError($e->getMessage());
            return Response::json([
                "message" => FATAL_ERROR
            ], 500);
        }
    }
}