<?php
namespace app\admin\validate;
use think\Validate;

class Login  extends Validate //定义验证器
{
   protected $rule=[
       ['user','require|min:3|max:10','用户名必填|用户名最少是3位|用户名最多是10位'],
       ['pass','require|min:3|max:10','密码必填|密码最少是3位|密码最多是10位'],
   ];
}