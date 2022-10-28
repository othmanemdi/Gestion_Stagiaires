<?php

ob_start();
// php
$title = "Excel";

$content_php = ob_get_clean();

ob_start(); ?>

<h3>Gestion des stagiaire avec Excel</h3>


<?php $content_html = ob_get_clean(); ?>