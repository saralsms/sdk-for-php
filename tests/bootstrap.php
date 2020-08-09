<?php
// default timezone
date_default_timezone_set('UTC');

// include autoloader
require_once dirname(__DIR__) . '/vendor/autoload.php';

// read env
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
