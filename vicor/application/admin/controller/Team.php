<?php
namespace app\admin\controller;
class Team extends Base
{
    public function _initialize()
    {
       $this->team=model("Team");
       $this->validate=validate("Team");
    }
    //获取页面
    public function index(){
      return view("index1");
   }
   //获取数据
   public function getteam(){
       $data=input("get.");
       $page=$data["page"];
       $limit=$data["limit"];
       $arr=[];
       if(!empty($data["tname"])){
           $arr["tname"]=["like","%".$data["tname"]."%"];
       }
       return  $this->team->showteam($page,$limit,$arr);
   }
   //跳转到插入页面
   public function showinsert(){
        return $this->fetch();
   }
   //插入功能
   public function insertteam(){
        if(!$this->request->isPost()){
            return json(["code"=>1,"msg"=>"请求方式错误"]);
        }
       $data=input("post.");
        if(!$this->validate->scene("insert")->check($data)){
            return json(["code"=>1,"msg"=>$this->validate->getError()]);
        }

       $result=$this->team->insertteam($data);
       if($result){
           return json([
               "code"=>0,
               "msg"=>"添加成功",
           ]);
       }
   }
   //删除数据
    public function delteam()
    {
        if (!$this->request->isPost()) {
            return json(["code" => 1, "msg" => "请求方式错误"]);
        }
        if (!$this->validate->scene("del")->check(input("post."))) {
            return json(["code" => 1, "msg" => $this->validate->getError()]);
        }
        $tid = input("post.tid");
        $result = $this->team->where("tid",$tid)->delete();
        if ($result) {
            return json(["code" => 0, "msg" => "删除成功"]);
        } else {
            return json(["code" => 1, "msg" => "删除失败"]);
        }
    }
    public function editteam()
    {
        //挂载商品所属分类
        $tid = input("get.tid");
        $team = $this->team->where(['tid' => $tid])->find();
        $this->assign("team", $team);
        return $this->fetch();
    }
    public function queryteam()
    {
        //挂载商品所属分类
        $tid = input("get.tid");
        $team = $this->team->where(['tid' => $tid])->find();
        $this->assign("team", $team);
        return $this->fetch();
    }
    public function updateteam()
    {
        $data = input("post.");
        $result = $this->team->where("tid", $data["tid"])->update($data);
        if ($result) {
            return json(["code" => 0, "msg" => "更新成功"]);
        } else {
            return json(["code" => 1, "msg" => "更新失败"]);
        }
    }
}