<?php

namespace app\admin\validate;
use think\Validate;

class Team  extends Validate
{
   protected $rule=[
     "tname"=>"require|max:50",
     "tposition"=>"require",
     "tavatar"=>"require",
     "texp"=>"require",
     "tdir"=>"require",
     "tmail"=>"require|email",
     "tstatus"=>"require",
       "tid"=>"require|number",
   ];
   protected $massage=[
       "tname.require"=>"名称必填",
       "tname.max"=>"名称不能超过50",
       "tposition.require"=>"团队职位必填",
       "tavatar.require"=>"团队缩略图必填",
       "texp.require"=>"团队经验必填",
       "tdir.require"=>"团队方向必填",
       "tmail.require"=>"团队邮箱必填",
       "tmail.email"=>"团队邮箱必须是邮箱格式",
       "tstatus.require"=>"团队状态必填",
       "tid.require"=>"团队序号必填",
       "tid.number"=>"团队序号必须是数字",
   ];
   protected $scene=[
       "insert"=>["tname","tposition","tavatar","texp","tdir","tmail","tstatus"],
       "del"=>["tid"]
   ];

}