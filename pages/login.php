<?php

ob_start();
// php
$title = "Login";

$content_php = ob_get_clean();

ob_start(); ?>

<h3>Login</h3>


<?php $content_html = ob_get_clean(); ?>