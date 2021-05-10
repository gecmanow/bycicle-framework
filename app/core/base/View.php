<?php


namespace framework\base;


class View {

    public $route;
    public $controller;
    public $model;
    public $view;
    public $prefix;
    public $layout;
    public $data = [];
    public $meta = [];

    // controller и model получаем из $route['controller'], так как имя модели совпадает с именем контроллера
    public function __construct($route, $layout = '', $view = '', $meta) {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->model = $route['controller'];
        $this->view = $view;
        $this->prefix = $route['prefix'];
        $this->meta = $meta;
        if ($layout === false) {
            // layout отсутствует
            $this->layout = false;
        } else {
            // layout, переданный явно или заданный по умолчанию
            $this->layout = $layout ?: LAYOUT;
        }
    }

    public function render($data) {
        if (is_array($data)) extract($data);
        $viewFile = APP . "/views/{$this->prefix}{$this->controller}/{$this->view}.php";
        if (is_file($viewFile)) {
            ob_start();
            require_once $viewFile;
            $content = ob_get_clean();
        } else {
            throw new \Exception("View {$viewFile} не найден", 500);
        }
        if ($this->layout !== false) {
            $layoutFile = APP . "/views/layouts/{$this->layout}.php";
            if (is_file($layoutFile)) {
                require_once $layoutFile;
            } else {
                throw new \Exception("Layout {$layoutFile} не найден", 500);
            }
        }
    }

    public function getMeta() {
        $output = '<title>' . $this->meta['title'] . '</title>';
        $output .= '<meta name="description" content="' . $this->meta['desc'] . '">';
        $output .= '<meta name="keywords" content="' . $this->meta['keywords'] . '">';
        return $output;
    }
}