<?php

error_reporting(-1);

require_once dirname(__DIR__) . './config/init.php';
require_once LIBS . '/functions.php';

header("Content-type: text/html; charset=utf-8");

new \framework\App();



