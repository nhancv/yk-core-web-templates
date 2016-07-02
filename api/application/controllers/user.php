<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhancao
 * Date: 5/9/16
 * Time: 5:36 PM
 */
class User extends Controller
{
    function index()
    {
        $template = $this->loadView('main_view');
        $template->render();
    }

    function validUser()
    {
        try {
            $userModel = UrlHelper::verifyHeader(false);
            if (MBase::checkNullField($_POST["pid"])) throw new Exception("object null");
            if (MBase::checkNullField($_POST["password"])) throw new Exception("object null");
            $userList = $userModel->validUser($_POST["pid"], $_POST["password"]);
            if (count($userList) == 0) {
                throw new Exception("User not valid");
            } else {
                $response["data"] = array();
                $user = $userList[0];
                $user["password"] = "***password***is***fuck***";
                array_push($response["data"], $user);
                $response["status"] = 0;
                $response["msg"] = "";
                echo Jsonx::json_encode_utf8($response);
            }
        } catch (Exception $e) {
            $response["status"] = 1;
            $response["msg"] = $e->getMessage();
            echo Jsonx::json_encode_utf8($response);
        }
    }

    function getUser()
    {
        try {
            $userModel = UrlHelper::verifyHeader(true);
            $userList = $userModel->getAllUser();
            $response["data"] = array();
            foreach ($userList as &$user) {
                array_push($response["data"], $user);
            }
            $response["status"] = 0;
            $response["msg"] = "";
            echo Jsonx::json_encode_utf8($response);
        } catch (Exception $e) {
            $response["status"] = 1;
            $response["msg"] = $e->getMessage();
            echo Jsonx::json_encode_utf8($response);
        }
    }

    function insertUser()
    {
        try {
            $userModel = UrlHelper::verifyHeader(true);
            if (MBase::checkNullField($_POST["pid"])) throw new Exception("object null");
            $user = Parsing::parsingNewUser($_POST);
            $res = $userModel->insertUser($user);
            $response["uid"] = $user->getUid();
            $response["msg"] = $res;
            $response["status"] = 0;
            echo Jsonx::json_encode_utf8($response);
        } catch (Exception $e) {
            $response["status"] = 1;
            $response["msg"] = $e->getMessage();
            echo Jsonx::json_encode_utf8($response);
        }
    }

    function updateUser()
    {
        try {
            $userModel = UrlHelper::verifyHeader(true);
            if (MBase::checkNull($_POST)) throw new Exception("object null");
            $user = Parsing::parsingEditUser($_POST);
            $res = $userModel->updateUser($user);
            $response["msg"] = $res;
            $response["status"] = 0;
            echo Jsonx::json_encode_utf8($response);
        } catch (Exception $e) {
            $response["status"] = 1;
            $response["msg"] = $e->getMessage();
            echo Jsonx::json_encode_utf8($response);
        }
    }

    function deleteUser()
    {
        try {
            $userModel = UrlHelper::verifyHeader(true);
            if (MBase::checkNull($_POST)) throw new Exception("object null");
            $user = Parsing::parsingNewUser($_POST);
            $res = $userModel->deleteUser($user->getUid());
            $response["msg"] = $res;
            $response["status"] = 0;
            echo Jsonx::json_encode_utf8($response);
        } catch (Exception $e) {
            $response["status"] = 1;
            $response["msg"] = $e->getMessage();
            echo Jsonx::json_encode_utf8($response);
        }
    }

    function deleteMultiUser()
    {
        try {
            $userModel = UrlHelper::verifyHeader(true);
            if (MBase::checkNullField($_POST["uid_arr"])) throw new Exception("object null");
            $res = $userModel->deleteMultiUser($_POST["uid_arr"]);
            $response["msg"] = $res;
            $response["status"] = 0;
            echo Jsonx::json_encode_utf8($response);
        } catch (Exception $e) {
            $response["status"] = 1;
            $response["msg"] = $e->getMessage();
            echo Jsonx::json_encode_utf8($response);
        }
    }


}
