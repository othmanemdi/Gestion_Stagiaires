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

function array_to_JSON($value): string
{
    return json_encode($value);
}

function JSON_to_array($value)
{
    return json_decode($value, true);
}

define('DIRECTORY',  dirname(__DIR__, 1));
