<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhancao
 * Date: 5/9/16
 * Time: 12:45 PM
 */
class UrlHelper
{

    public static function segment($seg)
    {
        if (!is_int($seg)) return false;

        $parts = explode('/', $_SERVER['REQUEST_URI']);
        return isset($parts[$seg]) ? $parts[$seg] : false;
    }

    public static function verifyHeader($hasToken)
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') throw new Exception ("check method");
        if ($_SERVER['HTTP_HOST'] != UrlHelper::base_url()) throw new Exception ("check host request");
        if ($_SERVER['CONTENT_TYPE'] != 'application/json;charset=UTF-8') throw new Exception ("check content type");
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST)) {
            if (empty($_POST)) {
                $_POST = Jsonx::json_decode_nice(file_get_contents('php://input'), true);
            } else {
                throw new Exception ("check request method");
            }
        }

        if ($hasToken != null && true == $hasToken) {
            if (MBase::checkNullField($_POST["token"])) {
                throw new Exception("token null");
            } else {
                $userModel = new UserModel();
                if (!$userModel->validToken($_POST["token"])) throw new Exception("Token is not valid");
                return $userModel;
            }
        } else {
            return new UserModel();
        }
    }

    public static function base_url()
    {
        global $config;
        return $config['base_url'];
    }

}
