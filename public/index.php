<?php

use framework\App;
use framework\Router;

error_reporting(-1);

require_once dirname(__DIR__) . './config/init.php';
require_once LIBS . '/functions.php';
require_once CONFIG . '/routes.php';

header("Content-type: text/html; charset=utf-8");

new App();


