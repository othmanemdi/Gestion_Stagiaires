<?php

$stagiaires = [
    1 => [
        'nom' => 'Hind',
        'note' => 10,
        'age' => 22,
    ],
    2 => [
        'nom' => 'Maryam',
        'note' => 10,
        'age' => 24,
    ],
    3  => [
        'nom' => 'Youssra',
        'note' => 10,
        'age' => 18,
    ],
    4 => [
        'nom' => 'Nabila',
        'note' => 10,
        'age' => 23,
    ],
    5 => [
        'nom' => 'Sara',
        'note' => 10,
        'age' => 24,
    ],
];

$stagiaire_json = json_encode($stagiaires);

// dd($stagiaire_json); 
$annee= time() + 60 * 60 * 24 *365 ;

setcookie('stagiaires', $stagiaire_json, $annee);

$get_stagiaire_from_cookie = $_COOKIE['stagiaires'];

$stagiaires_array = json_decode($_COOKIE['stagiaires'],true);







