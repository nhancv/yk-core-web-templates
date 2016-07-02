<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhancao
 * Date: 5/9/16
 * Time: 12:45 PM
 */
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Max-Age: 1200');
header("Content-Type: application/json;charset=UTF-8");
header('X-Content-Type-Options:nosniff');
header('X-Frame-Options:SAMEORIGIN');
header('X-XSS-Protection:1; mode=block');
class Controller
{

    public function loadModel($name)
    {
        require(APP_DIR . 'models/' . strtolower($name) . '.php');

        $model = new $name;
        return $model;
    }

    public function loadView($name)
    {
        $view = new View($name);
        return $view;
    }

    public function loadPlugin($name)
    {
        require(APP_DIR . 'plugins/' . strtolower($name) . '.php');
    }

    public function loadHelper($name)
    {
        require(APP_DIR . 'helpers/' . strtolower($name) . '.php');
        $helper = new $name;
        return $helper;
    }

    public function redirect($loc)
    {
        global $config;
        header('Location: ' . $config['base_url'] . $loc);
    }
}
