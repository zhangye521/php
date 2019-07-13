<?php
namespace app\index\controller;

use think\Controller;

class Lists extends Controller
{
   public function index(){
       return $this->fetch("index1");
   }
   public function query(){
       $page=input("get.page");
       $limit=input("get.limit");
       $data=model("Goods")->page($page,$limit)->select();
       return json([
           "code"=>0,
           "msg"=>"success",
           "data"=>$data,
       ]);
   }
}