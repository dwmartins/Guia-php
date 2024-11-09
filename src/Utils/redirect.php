<?php

function redirect(string $to) {
    header("Location: $to");
    exit();
}

function redirectWithMessage(string $to, string $type, string $message, array $data = []) {

    if(!empty($data)) {
        $firstParam = true;

        foreach ($data as $key => $value) {
            if ($firstParam) {
                $to .= '?' . urlencode($key) . '=' . urlencode($value);
                $firstParam = false;
            } else {
                $to .= '&' . urlencode($key) . '=' . urlencode($value);
            }
        }
    }

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

function showErrorPage() {
    include ROOT_VIEWS . "publicView/error.php";
    exit();
}