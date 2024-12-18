<?php

namespace App\Validators;

use Respect\Validation\Validator as v;

class TextValidator {

    /**
     * Validates an email.
     *
     * @param string $email
     * @return bool
     */
    public static function email(string $email) {
        return v::email()->validate($email);
    }

    /**
     * Validates a number.
     *
     * @param string $number
     * @return bool
     */
    public static function phone(string $number): bool
    {
        return v::numeric()->validate($number);
    }

    /**
     * Validates a name (letters and spaces).
     *
     * @param string $name
     * @return bool
     */
    public static function name(string $name): bool
    {
        return v::stringType()
            ->regex('/^[\p{L}\s\'-]+$/u')
            ->notEmpty()
            ->validate($name);
    }

    /**
     * Validates texts such as addresses, short sentences and descriptions.
     *
     * @param string $text
     * @return bool
     */
    public static function text(string $text): bool
    {
        return v::stringType()
            ->regex('/^[^%\$\<\>\{\}\|\^]+$/u')
            ->validate($text);
    }

    /**
     * Validates a URL.
     *
     * @param string $url
     * @return bool
     */
    public static function url(string $url) {
        return v::url()->validate($url);
    }
}