<?php

namespace app\index\model;

use think\Model;
use think\Validate;

class Wall extends Model
{
    //
    protected $table="wall";

    public function content(){
        return $this->belongsTo('Content','qq','qq');
    }

    public function addWall($data){
        $validate = new \app\index\validate\Wall;
        if (!$validate->check($data)){
            return $validate->getError();
        }
        if ($this->allowField(true)->save($data)){
            return 1;
        }else{
            return '推荐失败';
        }
    }
}
