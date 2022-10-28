<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

define("IP_SERVER", $_SERVER['SERVER_ADDR']);

function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
    die();
}
