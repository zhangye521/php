<?php
namespace app\admin\controller;
use think\Db;
class Category extends Base
{
    public function index(){
        return $this->fetch("index1");
    }
    //获取数据
    public function getcategory(){
        $page=input("get.page");
        $limit=input("get.limit");
        $cid=input("get.cid");
        $where=$cid?"cid=".$cid:"";
        $offset=$limit*($page-1);
        $current=Db::name("category")
            ->where($where)
            ->order("cid")
            ->limit($offset,$limit)
            ->select();
        $data=Db::name("category")->where($where)->select();
        $count=count($data);
        if($count){
            return json([
                "code"=>0,
                "msg"=>"数据获取成功",
                "count"=>$count,
                "data"=>$current,
            ]);
        }else{
            return json([
                "code"=>1,
                "msg"=>"数据获取失败",
            ]);
        }

    }
    //删除数据
    public function delcategory(){
        if(!$this->request->isPost()){
           return json(["code"=>1,"msg"=>"请求方式错误"]);
        }
        $validate=validate("Category");
        if(!$validate->scene("del")->check(input("post."))){
            return json(["code"=>1,"msg"=>$validate->getError()]);
        }
        $cid=input("post.cid");
        $result=Db::name("category")->where("cid",$cid)->delete();
        if($result){
            return json(["code"=>0,"msg"=>"删除成功"]);
        }else{
            return json(["code"=>1,"m sg"=>"删除失败"]);
        }
    }
    //编辑数据
    public function editcategory(){
        if(!request()->isPost()){
            return json(["code"=>1,"msg"=>"请求方式错误"]);
        };
        $validate=validate("Category");
        if(!$validate->scene('edit')->check(input("post."))){
            return json(["code"=>1,"msg"=>$validate->getError()]);
        }
        $cid=input("post.cid");
        $value=input("post.value");
        $field=input("post.field");
        $result=Db::name("category")->where("cid",$cid)->update([$field=>$value]);
        if($result){
            return json(["code"=>0,"msg"=>"修改成功"]);
        }else{
            return json(["code"=>1,"msg"=>"修改失败"]);
        }
    }
    //添加数据
    public function showinsert(){
     return $this->fetch();
    }
    public function insertcategory(){
        if(!request()->isPost()){
            return json(["code"=>1,"msg"=>"请求方式错误"]);
        };
        $validate=validate("Category");
        if(!$validate->scene('add')->check(input("post."))){
            return json(["code"=>1,"msg"=>$validate->getError()]);
        }
        $data=input("post.");
        $result=Db::name("category")->insert($data);
        if($result){
            return json(["code"=>0,"msg"=>"添加成功"]);
        }else{
            return json(["code"=>1,"msg"=>"添加失败"]);
        }
    }
}