<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
class Base extends Controller
{
    public function _initialize()
    {
       if(!(session("username") && session("id"))){
           $this->error("请登录","admin/login/init");
       }else{
           $id=session("id");
           $admin=Db::name("admin")->where("id",$id)->find();
           $this->assign("admin",$admin);//挂载变量
       }
    }
}