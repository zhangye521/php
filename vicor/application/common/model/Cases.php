<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/7/10
 * Time: 14:52
 */

namespace app\common\model;
use think\Model;

class Cases extends Model
{
  public function getcases($page,$limit,$arr){
     $data=$this->where($arr)->page($page,$limit)->select();
     $count=$this->where($arr)->count();
     if($count){
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
  public function editcases($aid){
     return $this->get($aid);
  }
  public function updatecases($aid,$data){
      return $this->where("aid",$aid)->update($data);
  }
  public function showcases(){
      $data=$this->find();
      return $data;
  }
}