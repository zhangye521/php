<?php
namespace app\admin\validate;
use think\Validate;

class Setting extends  Validate
{
  protected $rules=[
      ['title','require','网站标题必填'],
      ['keywords','require','网站关键字必填'],
      ['des','require','网站描述必填'],
      ['copyright','require','网站版权必填'],
  ];
}