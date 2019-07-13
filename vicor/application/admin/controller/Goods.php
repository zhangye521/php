<?php

namespace app\admin\controller;

use think\Db;

class Goods extends Base
{

    public function _initialize()
    {
        $this->validate = validate("Goods");
        $this->goods = model("Goods");
    }

    public function showinsert()
    {
        $category = model("Category"); //使用模型助手函数引入模型
        $data = $category->getcategory();//调用模型的方法读取数据
        $this->assign("category", $data);
        $result = $this->goods->read();
        $this->assign("goods", $result);
        return $this->fetch();
    }

    //数据的添加
    public function insertgoods()
    {
        if (!$this->request->isPost()) {
            return json(["code" => 1, "msg" => "请求方式错误"]);
        }

        if (!$this->validate->scene("insert")->check(input("post."))) {
            return json(["code" => 1, "msg" => $this->validate->getError()]);
        }
        $data = input("post.");
        $result = $this->goods->insertgoods($data);
        if ($result) {
            return json(["code" => 0, "msg" => "添加成功"]);
        } else {
            return json(["code" => 1, "msg" => "添加失败"]);
        }
    }

    //打开查看页面
    public function index()
    {
        $category = model('Category')->getcategory();
        $this->assign("category", $category);
        return $this->fetch("index1");
    }

    //数据的查询
    public function getgoods()
    {  $data = input("get.");
       $page=$data["page"];
       $limit=$data["limit"];
        $arr = [];
        if (!empty($data["cid"])) {
            $arr["cid"] = ["=", $data['cid']];
        }
        if (!empty($data["ctitle"])) {
            $arr["ctitle"] = ["like", "%" . $data['ctitle'] . "%"];
        }
        if (!empty($data["price_min"]) && !empty($data['price_max'])&&$data["price_min"]<$data["price_max"]){
            $arr["price"]=[
                ["<",$data["price_max"]],
                [">",$data["price_min"]],
            ];
        }
       return $this->goods->getgoods($page,$limit,$arr);
    }

    //删除数据
    public function delgoods()
    {
        if (!$this->request->isPost()) {
            return json(["code" => 1, "msg" => "请求方式错误"]);
        }
        if (!$this->validate->scene("del")->check(input("post."))) {
            return json(["code" => 1, "msg" => $this->validate->getError()]);
        }
        $id = input("post.id");
        $result = $this->goods->delgoods($id);
        if ($result) {
            return json(["code" => 0, "msg" => "删除成功"]);
        } else {
            return json(["code" => 1, "m sg" => "删除失败"]);
        }
    }

    public function editgoods()
    {
        $category = model("Category"); //使用模型助手函数引入模型
        $data = $category->getcategory();//调用模型的方法读取数据
        //挂载分类信息
        $this->assign("category", $data);
        //挂载商品所属分类
        $id = input("get.id");
        $goods = $this->goods->where(['id' => $id])->find();
        $goods["banner"] = explode(",", $goods["gbanner"]);
        $this->assign('arrbanner', $goods["banner"]);
        $goods["detail"] = explode(",", $goods["gdetail"]);
        $this->assign("arrdetail", $goods["detail"]);
        $this->assign("goods", $goods);
        return $this->fetch();
    }

    public function querygoods()
    {
        $category = model("Category"); //使用模型助手函数引入模型
        $data = $category->getcategory();//调用模型的方法读取数据
        //挂载分类信息
        $this->assign("category", $data);
        //挂载商品所属分类
        $id = input("get.id");
        $goods = $this->goods->where(['id' => $id])->find();
        $goods["banner"] = explode(",", $goods["gbanner"]);
        $goods["detail"] = explode(",", $goods["gdetail"]);
        $this->assign("arrdetail", $goods["detail"]);
        $this->assign('arrbanner', $goods["banner"]);
        $this->assign("goods", $goods);
        return $this->fetch();
    }

    public function updategoods()
    {
        $data = input("post.");
        $result = $this->goods->where("id", $data["id"])->update($data);
        if ($result) {
            return json(["code" => 0, "msg" => "更新成功"]);
        } else {
            return json(["code" => 1, "msg" => "更新失败"]);
        }
    }
}