<?php

ob_start();
// php
$title = "Register";

$content_php = ob_get_clean();

ob_start(); ?>

<h3>Register</h3>


<?php $content_html = ob_get_clean(); ?>