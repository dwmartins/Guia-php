<?php

namespace App\Validators;

class UserValidator {
    public static function update(array $data) {
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
            "description" => [
                "label" => LABEL_DESCRIPTION,
                "require" => false
            ],
            "phone" => [
                "label" => LABEL_PHONE,
                "require" => false
            ],
            "address" => [
                "label" => LABEL_ADDRESS,
                "require" => false
            ],
            "complement" => [
                "label" => LABEL_COMPLEMENT,
                "require" => false
            ],
            "city" => [
                "label" => LABEL_CITY,
                "require" => false
            ],
            "zipCode" => [
                "label" => LABEL_ZIP_CODE,
                "require" => false
            ],
            "state" => [
                "label" => LABEL_STATE,
                "require" => false
            ],
            "country" => [
                "label" => LABEL_COUNTRY,
                "require" => false
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
                    $response['message'] = sprintf(FIELD_INVALID_CHARACTERS, $requireFields[$key]['label']);
                    return $response;
                }

                continue;
            }

            if($key === "phone" || $key === "zipCode") {
                if(!is_numeric($value)) {
                    $response['isValid'] = false;
                    $response['message'] = sprintf(FIELD_INVALID_CHARACTERS, $requireFields[$key]['label']);
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