<?php


namespace framework;


class App {

    public static $app;

    public function __construct() {
        //получаем запрос
        $query = trim($_SERVER['QUERY_STRING'], '/');
        session_start();
        //получаем контейнер с объектом реестра, содержащим параметры
        self::$app = Registry::instance();
        $this->getParams();
        new ErrorHandler();
    }

    protected function getParams() {
        $params = require_once CONFIG . '/params.php';
        if (!empty($params)) {
            foreach ($params as $key => $value) {
                self::$app->setProperty($key, $value);
            }
        }
    }
}