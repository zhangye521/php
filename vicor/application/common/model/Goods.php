<?php

namespace app\common\model;

use think\Model;

class Goods extends Model
{
    public function read()
    {
        return $this->find();
    }

    public function insertgoods($data)
    {
        //过滤post数组中的非数据表字段数据s
        return $this->isUpdate(false)->save($data);
    }
    public function getgoods($page,$limit,$farr=[]){
        $count=$this->where($farr)->count();
        $data=$this->where($farr)->page($page,$limit)->select();
//        echo $this->getLastSql();
//        exit();
        return json([
            "code"=>0,
            "msg"=>"数据获取成功",
            "data"=>$data,
            "count"=>$count,
        ]);
    }
    public function delgoods($id){
        return $this->where("id",$id)->delete();
    }
    public function editgoods($id){
        return $this->where("id",$id)->select();
    }
    public function banner(){
        $data=$this->order("update_time","desc")->limit(0,3)->select();
        return $data;
    }
    public function newgoods(){
        $data=$this->order("","desc")->limit(0,4)->select();
        return $data;
    }
    public function hotgoods(){
        $data=$this->order("gsales","desc")->limit(0,4)->select();

        return $data;
    }
    public function showlist(){
        $data=$this->select();
        return $data;
    }
}