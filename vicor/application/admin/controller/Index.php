<?php
namespace app\admin\controller;

class Index extends Base
{
   public function init(){
       return $this->fetch("index1");
   }
}