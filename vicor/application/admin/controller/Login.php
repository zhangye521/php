<?php

namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Session;

class Login extends Controller
{
    public function init()
    {
        return $this->fetch('login');
    }

    public function check()
    {
        if ($this->request->method() != "POST") {
            return json(["msg" => "请求方式错误", "code" => "10002"], 10002);
        }//验证请求的方式
        $data = input("post.");
        $validate = validate("Login");
        if (!$validate->check($data)) {
            return json(["code" => 10001, 'msg' => $validate->getError()]);
        }
        $user = input("post.user");
        $pass = md5(input("post.pass"));
        $data = Db::name("admin")->where("username", $user)->find();//查询一条数据
        if (count($data)) {
            if ($data["password"] == $pass) {
                Session::set("username", $user);
                Session::set("id", $data["id"]);
                return json(["code" => 200, "msg" => "登录成功"], 200);
            } else {
                return json(["code" => 10001, "msg" => "用户名和密码不匹配"], 10001);
            }
        } else {
            return json(["code" => 10002, "msg" => "用户不存在"], 10001);
        }
    }
    public function logout(){
        Session::clear(); //清空session
//      $this->fetch("admin/login/init");
        $this->success("退出成功","admin/login/init");//返回登录页面
    }
}