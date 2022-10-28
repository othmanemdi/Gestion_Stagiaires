<?php

ob_start();
// php
$title = "MySql";

$content_php = ob_get_clean();

ob_start(); ?>

<h3>Gestion des stagiaire avec MySql</h3>


<?php $content_html = ob_get_clean(); ?>