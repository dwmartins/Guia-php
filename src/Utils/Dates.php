<?php

function setGreeting() {
    $hour = date('G');

    if ($hour >= 6 && $hour < 12) {
        return GOOD_MORNING;
    } elseif ($hour >= 12 && $hour < 18) {
        return GOOD_AFTERNOON;
    } else {
        return GOOD_NIGHT;
    }
}

function getDateAsString($date) {
    $dateTime = new DateTime($date);

    $formatter = new IntlDateFormatter(
        LANGUAGE,
        IntlDateFormatter::LONG,
        IntlDateFormatter::NONE
    );

    return $formatter->format($dateTime);
}

function getSimpleDate($date) {
    $format = getSetting('dateFormat') ?? 'DD-MM-YYYY';
    $inputFormat = 'Y-m-d';
    $dateTime = DateTime::createFromFormat($inputFormat, $date);

    if($dateTime) {
        $normalizedFormat = str_replace('-', '/', $format);
        $phpFormat = str_replace(['DD', 'MM', 'YYYY'], ['d', 'm', 'Y'], $normalizedFormat);

        return $dateTime->format($phpFormat);
    }

    return $date;
}