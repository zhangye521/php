<?php

namespace app\common\model;
use think\Model;
class Category extends Model //模型会自动对应一个数据表
{
     public function getcategory(){
         return $this->all(); //如果要查询多个数据，可以使用模型的 all 方法，
     }
}