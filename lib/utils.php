<?php


function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function str_contains($haystack, $needle) {
    return '' === $needle || false !== strpos($haystack, $needle);
}

function redirectToReferer($normal_referer_url, $fallback_url) {
    if ( str_contains($_SERVER['HTTP_REFERER'], $normal_referer_url) ) {
        header('Location: ' . $_SERVER['HTTP_REFERER'] );
        die();
    }
    else {
        header('Location: ' . $fallback_url);
        die();
    }
}

?>