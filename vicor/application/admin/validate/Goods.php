<?php

namespace app\admin\validate;
use think\Validate;
class Goods extends Validate
{
    protected $rule=[
        "ctitle"=>"require",
        "etitle"=>"require",
        "gdes"=>"require",
        "price"=>"require",
        "gthumb"=>"require",
        "gbanner"=>"require",
        "gcolor"=>"require",
        "gspec"=>"require",
        "gtype"=>"require",
        "gdistribution"=>"require",
        "gdetail"=>"require",
        "gstock"=>"require",
        "field"=>"require",
        "value"=>"require",
        "id"=>"require|number"
    ];
    protected $message=[
        "ctitle.require"=>"中文名必填",
        "etitle.require"=>"英文名必填",
        "gdes.require"=>"商品描述必填",
        "price.require"=>"商品价格必填",
        "gthumb.require"=>"缩略图必上传",
        "gbanner.require"=>"商品轮播图必上传",
        "gcolor.require"=>"商品颜色必填",
        "gspec.require"=>"商品规格比必填",
        "gtype.require"=>"商品类型必填",
        "gdistribution.require"=>"配送信息必填",
        "gdetail.require"=>"商品详情必填",
        "gstock.require"=>"商品库存必填",
        "field"=>"field必须传 ",
        "value"=>"value必须传 ",
        "id.require"=>"id必传",
        "id.number"=>"id必须是数字"
    ];
    protected $scene=[
      "insert"=>['ctitle',"etitle","gdes","price","gthumb","gbanner","gcolor","gspec","gtype","gdistribution","gdetail","gstock"],
        "del"=>["id"],
        "edit"=>["id","field","value"],
    ];

}