<?php 

function setFlash($index, $message) {
    if(!isset($_SESSION['flash'][$index])){
        $_SESSION['flash'][$index] = $message;
    }
}

function getFlash($index, $style = "text-danger") {
    if(isset($_SESSION['flash'][$index])){
        $flash = $_SESSION['flash'][$index];
        unset($_SESSION['flash'][$index]);

        return "<p class='opacity-75 flashMsg py-1 m-0 {$style}'>$flash</p>";
    }
}