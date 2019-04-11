<?php

namespace app\core;

class View
{
    public $path;
    public $route;
    public $layout = 'default';

    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'] . '/' . $route['action'];
        // debug($this->path);
    }

    public function render($title, $vars = [], $tasks = [])
    {
        extract($vars);
        extract($tasks);
        $path = 'app/views/' . $this->path . '.php';
        if (file_exists($path)) {
            ob_start();
            require $path;
            $content = ob_get_clean();
            require 'app/views/layout/' . $this->layout . '.php';
        }
    }

    public static function errorCode($code)
    {
        http_response_code($code);
        $path = 'app/views/errors/' . $code . '.php';
        if (file_exists($path)) {
            require $path;
        }
        exit;
    }

    public function redirect($url)
    {
        echo "<script type='text/javascript'>window.location = '$url'</script>";
        exit;
    }

    public function message($message)
    {
        echo "<script type='text/javascript'>alert ('$message')</script>";
    }

    public function messagejs($status, $message)
    {
        exit(json_encode(['status' => $status, 'message' => $message]));
    }

    public function location($url)
    {
        exit(json_encode(['url' => $url]));
    }

}