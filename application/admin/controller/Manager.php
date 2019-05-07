<?php


namespace app\admin\controller;


use PHPMailer\Email;
use think\Controller;

class Manager extends Controller
{
    protected $manager;

    public function initialize()
    {
        $this->manager = model("Manager");
    }

    public function login()
    {
        $manager = session("manager", "", "admin");
        if ($manager) {
            return redirect("index/index");
        }
        return $this->fetch();
    }

    public function logout()
    {
        session("manager", null, "admin");
        return $this->redirect("manager/login");
    }

    public function verify()
    {
        if (request()->isPost()) {
            $data = input("post.");
            $isExist = $this->manager->where([
                "name" => $data["name"],
                "password" => md5($data["password"]),
                "is_active" => 1
            ])->find();
            if ($isExist) {
                session("manager", $isExist, "admin");
                return $this->success("登陆成功！", url("index/index"));
            } else {
                return $this->error("用户名或者密码错误，或者用户不存在，请重试！");
            }
        } else {
            return $this->fetch("manager/login");
        }
    }

    public function register()
    {
        return $this->fetch();
    }

    public function add()
    {
        if (!request()->isPost()) {
            return $this->error("请求方法失败!");
        }
        $data = input("post.");
//        halt($data);
        if (!captcha_check($data["captcha"])) {
            return $this->error("验证码错误！");
        }

        $data["avatar"] = $this->image("avatar");
        $validate = validate("Manager");
        if (!$validate->scene("add")->check($data)) {
            return $this->error($validate->getError());
        }

        $data["active_code"] = rand(1000, 9999) . time();
        $url = request()->domain() . url('manager/active', [
                "name" => $data["name"],
                "active_code" => md5($data["active_code"])
            ]);
        $title = "管理员激活通知";
        $content = "您的申请已经提交，您可以通过点击链接<a href='" . $url . "' target='_blank'>激活</a>！或者点击 '" . $url . "'";
        $send = Email::send($title, $content, $data["email"]);
        if ($send) {
            $addManager = $this->manager->add($data);
            if ($addManager) {
                return $this->success("管理用户已经激活，请查看邮件登陆！", "manager/login", "",10);
            } else {
                return $this->error("邮件发送失败,请重试！");
            }
        } else {
            return $this->error("邮件发送失败，请重试");
        }
    }

    public function active()
    {
        $getName = input("get.name");
        $getCode = input("get.active_code");
        $getInfo = $this->manager->where("name", $getName)->find();
        if (md5($getInfo["active_code"]) != $getCode) {
            return $this->error("注册码失败，请重新注册！", "manager/register");
        }
        $managerID = $getInfo["id"];
        if ($managerID) {
            $addActive = $this->manager->save(['is_active' => 1], ["id" => $managerID]);
            if ($addActive) {
                return $this->success("注册成功，请登录！", "manager/login");
            } else {
                return $this->error("注册激活失败，请重新注册！", "manager/register");
            }
        } else {
            return $this->error("注册用户不存在，请重新注册！", "manager/register");
        }
    }

    /*public function wait()
    {
        return $this->fetch();
    }*/

    protected function image($img)
    {
        $image = request()->file($img);
        $info = $image->validate(['size' => 2097152, 'ext' => 'jpg,png,gif'])->move("uploads");
        if (!$info) {
            return $info->getError();
        }
        /*echo $info->getExtension();
        echo $info->getSaveName();
        echo $info->getFilename();*/
        return '\\' . $info->getPathName();
    }
}
