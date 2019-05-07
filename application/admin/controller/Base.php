<?php


namespace app\admin\controller;


use think\Controller;

class Base extends Controller
{
    public function initialize()
    {
        $this->isLogin();
    }

    protected function isLogin()
    {
        $getLogin = session("manager", "", "admin");
        if(!$getLogin) {
            return $this->redirect("manager/login");
        }
    }
    /*public function initialize()
    {
        $isLogin = $this->isLogin();
        if (!$isLogin) {
            return $this->redirect("manager/login");
        }
    }

    protected function isLogin()
    {
        $getLogin = session("manager", "", "admin");
        if($getLogin) {
            return true;
        } else {
            return false;
        }
    }*/
}
