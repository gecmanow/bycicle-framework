<?php

namespace app\controllers;

use framework\App;

class MainController extends AppController {

    public function indexAction() {
        $this->setMeta(App::$app->getProperty('app_name'), 'Framework Bycicle', 'framework, php, bycicle');
        $var = 'example';
        $array = ['val1', 'val2'];
        $this->set(compact('var', 'array'));
    }
}