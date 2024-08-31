<?php

namespace App\Validators;

class ContactValidator {
    public static function send(array $data){
        $requireFields = [
            "name" => [
                "label" => LABEL_NAME,
                "require" => true
            ],
            "lastName" => [
                "label" => LABEL_LAST_NAME,
                "require" => true
            ],
            "email" => [
                "label" => LABEL_EMAIL,
                "require" => true
            ],
            "company" => [
                "label" => LABEL_COMPANY,
                "require" => false
            ],
            "description" => [
                "label" => LABEL_DESCRIPTION,
                "require" => true
            ],
        ];

        $response = [
            "isValid" => true,
            "message" => ""
        ];

        foreach ($data as $key => $value) {
            if(empty($value) && !$requireFields[$key]['require']) {
                continue;
            }

            // Checks if the field is required and is missing or empty
            if (empty($value) && $requireFields[$key]['require']) {
                $response['isValid'] = false;
                $response['message'] = sprintf(REQUIRED_FIELD, $requireFields[$key]['label']);
                return $response;
            }

            if($key === "name" || $key === "lastName") {
                if(!TextValidator::name($value)) {
                    $response['isValid'] = false;
                    $response['message'] = sprintf(FIELD_INVALID_CHARACTERS, $requireFields[$key]['label']);
                    return $response;
                }

                continue;
            }

            if($key === "email") {
                if(!TextValidator::email($value)) {
                    $response['isValid'] = false;
                    $response['message'] = EMAIL_INVALID;
                    return $response;
                }

                continue;
            }

            if(!TextValidator::text($value)) {
                $response['isValid'] = false;
                $response['message'] = sprintf(FIELD_INVALID_CHARACTERS, $requireFields[$key]['label']);
                return $response;
            }
        }

        return $response;
    }
}
