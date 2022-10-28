<?php

SESSION_start();

function dd($value): string
{
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    exit();
}