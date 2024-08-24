<?php

function showText($text) {
    if (defined($text)) {
        return constant($text);
    }

    return $text;
}