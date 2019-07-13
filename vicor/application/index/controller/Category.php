<?php

namespace app\index\controller;

class Category extends Web
{
    public function index()
    {
        $cateData=model("Category")->getcategory();
        $this->assign("category",$cateData);
        return $this->fetch("classify");
    }

}