<?php
namespace app\index\controller;
class Index extends Web
{
    public function index()
    {
        $bannerData=model("Goods")->banner();
        $this->assign("banner",$bannerData);
        $newData=model("Goods")->newgoods();
        $this->assign("newgoods",$newData);
        $hotData=model("Goods")->hotgoods();

        for($i=0;$i<count($hotData);$i++){
          $hotData[$i]["gcolor"]=explode(",",$hotData[$i]["gcolor"]);
        }
        $this->assign("hotgoods",$hotData);
        $cases=model("Cases")->showcases();
        $this->assign("cases",$cases);
        return $this->fetch( 'index1');
    }
}
