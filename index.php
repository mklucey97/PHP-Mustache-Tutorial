<?php
require_once 'vendor/autoload.php';
require_once 'autoload.php';

Mustache_Autoloader::register();

$templates = new Templates();
$page = $templates->getPageURL();



?>