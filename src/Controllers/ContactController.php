<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;
use App\Validators\ContactValidator;

class ContactController {
    /**
     * @return View "publicView/contact.php"
     */
    public function index(Request $request, $params) {
        $pageTitle = CONTACT;
        $siteInfo = getSiteInfo();

        if(!empty($siteInfo->getWebSiteName())) {
            $pageTitle .= " | " . $siteInfo->getWebSiteName();
        }
        
        return [
            "view" => "publicView/contact.php",
            "data" => [
                "title" => $pageTitle
            ]
        ];
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