<?php

namespace app\admin\validate;

use think\Validate;

class Info extends Validate
{
    protected $rule = [
        ['username', 'require|min:3|max:6', '用户名必填|最少三位|最多10位'],
        ['email', 'email', '邮箱格式错误'],
        ['sex', 'require', '性别必填'],
        ['avatar', 'require', '头像必传'],
        ['remark', 'require', '备注必填'],
    ];
}