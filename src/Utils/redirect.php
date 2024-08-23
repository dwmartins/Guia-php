<?php

function redirect(string $to) {
    header("Location: $to");
    exit();
}

function redirectWithMessage(string $to, string $type, string $message) {
    echo 
    "<script>
        const alert = {
            type: '$type',
            message: '$message'
        };

        localStorage.setItem('alert', JSON.stringify(alert));
        window.location.href = '$to';
    </script>";
    exit();
}