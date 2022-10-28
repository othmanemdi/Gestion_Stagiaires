<?php

ob_start();
// php
$title = "Fichier";

$content_php = ob_get_clean();

ob_start(); ?>

<h3>Gestion des stagiaire avec les fichiers</h3>


<?php $content_html = ob_get_clean(); ?>