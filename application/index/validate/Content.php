<?php
/**
 * Created by PhpStorm.
 * User: 63430
 * Date: 2018/11/24
 * Time: 12:07
 */

namespace app\index\validate;

use think\Validate;

class Content extends Validate
{
    protected $rule=[
        'nickname|昵称' => 'require',
        'text|表白内容'  => 'require|max:250',

    ];

    public function sceneAdd(){
        return $this->only(['nickname','text']);
    }
}