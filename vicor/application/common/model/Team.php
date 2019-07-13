<?php
namespace app\common\model;

use think\Model;
class Team extends Model
{
    public function showteam($page,$limit,$farr=[]){
        $count=$this->where($farr)->count();
        $data=$this->where($farr)->page($page,$limit)->select();
        if($data){
            return json([
                "code"=>0,
                "msg"=>"数据获取成功",
                "data"=>$data,
                "count"=>$count
            ]);
        }else{
            return json([
                "code"=>0,
                "msg"=>"数据获取失败",
            ]);
        }
    }
    public function insertteam($data){
        return $this->isUpdate(false)->save($data);
    }
}