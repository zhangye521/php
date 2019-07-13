<?php

namespace app\admin\controller;


class Cases extends Base
{
    public function _initialize()
    {
       $this->cases=model("Cases");
       $this->validate=validate("Cases");
       $this->team=model("Team");
    }

    public function index()
    {
        return $this->fetch("index1");
    }
    public function showcases(){
        $data=input("get.");
        $page=$data["page"];
        $limit=$data["limit"];
        $arr=[];
        if(!empty($data["aname"])){
            $arr["aname"]=["like","%".$data["aname"]."%"];
        }
        return $this->cases->getcases($page,$limit,$arr);
    }
    public function showinsert(){
        $data=$this->team->select();
        $this->assign("team",$data);
        return $this->fetch();
    }
    public function insertcases(){
        if(!$this->request->isPost()){
            return json([
                "code"=>1,
                "msg"=>"请求方式错误",
            ]);
        }
        if(!$this->validate->scene("insert")->check(input("post."))){
            return json([
                "code"=>1,
                "msg"=>$this->validate->getError(),
            ]);
        }
        $data=input("post.");
       $result=$this->cases->insert($data);
       if($result){
           return json([
               "code"=>0,
               "msg"=>"添加成功",
           ]);
       }else{
           return json([
               "code"=>1,
               "msg"=>"添加失败",
           ]);
       }
    }
    public function delcases(){
        if(!$this->request->isPost()){
            return json([
                "code"=>1,
                "msg"=>"请求方式错误",
            ]);
        }
        if(!$this->validate->scene("del")->check(input("post."))){
            return json([
                "code"=>1,
                "msg"=>$this->validate->getError(),
            ]);
        }
        $aid=input("post.aid");
        $result=$this->cases->where("aid",$aid)->delete();
        if($result){
            return json([
                "code"=>0,
                "msg"=>"删除成功",
            ]);
        }else{
            return json([
                "code"=>1,
                "msg"=>"删除失败",
            ]);
        }
    }
    public function editcases(){
        $aid=input("get.aid");
        $data=$this->team->select();
        $this->assign("team",$data);
        $cases=$this->cases->editcases($aid);
        $this->assign("cases",$cases);
        return $this->fetch();
    }
    public function updatecases(){
        if(!$this->request->isPost()){
            return json([
                "code"=>1,
                "msg"=>"请求方式错误",
            ]);
        }
        if(!$this->validate->scene("update")->check(input("post."))){
            return json([
                "code"=>1,
                "msg"=>$this->validate->getError(),
            ]);
        }
      $aid=input("post.aid");
      $data=input("post.");
      $result=$this->cases->updatecases($aid,$data);
        if($result){
            return json([
                "code"=>0,
                "msg"=>"更新成功",
            ]);
        }else{
            return json([
                "code"=>1,
                "msg"=>"更新失败",
            ]);
        }
    }
    public function querycases(){
        $aid=input("get.aid");
        $data=$this->team->select();
        $this->assign("team",$data);
        $cases=$this->cases->editcases($aid);
        $this->assign("cases",$cases);
        return $this->fetch();
    }
}