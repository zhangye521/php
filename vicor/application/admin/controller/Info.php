<?php

namespace app\admin\controller;

use think\Validate;
use think\Db;

class Info extends Base
{
    //个人资料修改
    public function index()
    {
        return $this->fetch("index");
    }
    public function update()
    {
        if ($this->request->method() != "POST") {
            return json(["msg" => "请求方式错误", "code" => 10002], 10002);
        }
        $data = input("post.");
        $validate = validate("Info");
        if (!$validate->check($data)) {
            return json(["msg" => $validate->getError(), "code" => 10002], 10002);
        }
        $id=session("id");
        $update = Db::name('admin')->where('id', $id)->update($data);
        if (!$update) {
            return json(["msg" => "更新失败", "code" => 10002], 10002);
        } else {
            return json(["msg" => "更新成功", "code" => 200], 200);
        }

    }
    //网站设置修改
    public function  system(){
        $data=Db::name("webinfo")->find();
        $this->assign("webinfo",$data);
        return $this->fetch();
    }
    public function setting()
    {
        if ($this->request->method() != "POST") {
            return json(["msg" => "请求方式错误", "code" => 10002], 10002);
        }
        $data = input("post.");
        $validate = validate("Setting");
        if (!$validate->check($data)) {
            return json(["msg" => $validate->getError(), "code" => 10002], 10002);
        }
        $id=session("id");
        $update = Db::name('webinfo')->where('id', $id)->update($data);
        if ($update!=1) {
            return json(["msg" => "没有作出修改", "code" => 10002], 10002);
        } else {
            return json(["msg" => "更新成功", "code" => 200], 200);
        }

    }
}