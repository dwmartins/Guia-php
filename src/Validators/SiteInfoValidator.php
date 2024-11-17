<?php

namespace App\Validators;

use App\Class\SiteInfo;
use App\Http\Response;

class SiteInfoValidator {
    public static function create(array $data) {
        $fields = [
            "webSiteName" => [
                "label" => SITE_NAME_LABEL,
                "required" => false
            ],
            "email" => [
                "label" => LABEL_EMAIL,
                "required" => false
            ],
            "phone" => [
                "label" => LABEL_PHONE,
                "required" => false
            ],
            "city" => [
                "label" => LABEL_CITY,
                "required" => false
            ],
            "state" => [
                "label" => LABEL_STATE,
                "required" => false
            ],
            "address" => [
                "label" => LABEL_ADDRESS,
                "required" => false
            ],
            "instagram" => [
                "label" => INSTAGRAM_LABEL,
                "required" => false
            ],
            "facebook" => [
                "label" => FACEBOOK_LABEL,
                "required" => false
            ],
            "twitter" => [
                "label" => TWITTER_LABEL,
                "required" => false
            ],
            "description" => [
                "label" => LABEL_DESCRIPTION,
                "required" => false
            ],
            "keywords" => [
                "label" => KEYWORDS_LABEL,
                "required" => false
            ]
        ];

        $response = [
            "isValid" => true,
            "message" => ""
        ];

        foreach ($data as $key => $value) {
            if(empty($value) && !$fields[$key]['required']) {
                continue;
            }

            if(empty($value) && $fields[$key]['required']) {
                $response['isValid'] = false;
                $response['message'] = sprintf(REQUIRED_FIELD, $fields[$key]['label']);
                return $response;
            }

            if(!TextValidator::text($value)) {
                $response['isValid'] = false;
                $response['message'] = sprintf(FIELD_INVALID_CHARACTERS, $fields[$key]['label']);
                return $response;
            }
        }

        return $response;
    }
}