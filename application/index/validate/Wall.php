<?php
/**
 * Created by PhpStorm.
 * User: 63430
 * Date: 2018/11/24
 * Time: 13:28
 */

namespace app\index\validate;
use think\validate;


class Wall extends validate
{
    protected $rule=[
        'wall-qq|推荐墙QQ' => 'require|number'
    ];
}