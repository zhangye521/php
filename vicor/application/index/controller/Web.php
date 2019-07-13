<?php
namespace app\index\controller;
use think\Controller;

class Web extends Controller
{
    public function _initialize()
    {
        $webData=model("Webinfo")->getinfo();
        $this->assign("web",$webData);
    }

}