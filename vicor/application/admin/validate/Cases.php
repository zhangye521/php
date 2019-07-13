<?php

namespace app\admin\validate;
use think\Validate;

class Cases extends Validate
{
   protected $rule=[
       "aname"=>"require|max:20",
       "athumb"=>"require",
       "ades"=>"require",
       "tid"=>"require",
       "aid"=>"require",
   ];
   protected $msg=[
       "aname.require"=>"产品名称必填",
       "aname.max"=>"最多不能超过20位",
       "athumb.require"=>"缩略图必传",
       "ades.require"=>"产品描述必填",
       "tid.require"=>"tid必填",
       "aid.require"=>"aid必填",
   ];
   protected $scene=[
       "insert"=>["aname","athumb","ades","tid"],
       "del"=>['aid'],
       "update"=>["aname","athumb","ades","tid","aid"],
   ];

}