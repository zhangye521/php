<?php
namespace app\admin\validate;
use think\Validate;

class Category extends Validate
{
   protected $rule=[
       "cid"=>"require|number",
       "field"=>"require",
       "value"=>"require",
       'cname'=>"require|max:20",
       'sort'=>"require|number",
   ];
   protected $message=[
       "cid.require"=>"cid必填",
       "cid.number"=>"cid必须是数字 ",
       "field"=>"field必须传 ",
       "value"=>"value必须传 ",
       "cname.require"=>"分类名必须填 ",
       "cname.max"=>"分类名不能超过20位 ",
       "sort.require"=>"排序必须传 ",
       "sort.number"=>"排序必须是数字 ",
   ];
   protected $scene=[
       "del"=>["cid"],
       "edit"=>["cid","field","value"],
       "add"=>["cname","sort"]
   ];
}