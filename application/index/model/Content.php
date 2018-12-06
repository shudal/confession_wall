<?php

namespace app\index\model;

use think\Exception;
use think\Model;

class Content extends Model
{
    //
    protected $table = 'content';

    public function wall(){
        return $this->hasOne('Wall','qq','qq');
    }

    public function addInfo($data){
        $validate = new \app\index\validate\Content;
        if(!$validate->scene('add')->check($data)){
            return $validate->getError();
        }
        if($data['file']){
            $info = $data['file']->move('../public/uploads/',"");
            $data['img'] = '/uploads/' . $info->getSaveName();
        }else{
            $data['img'] = '/static/img/默认头像.png';
        }
        unset($data['file']);
        if ($this->save($data)){
            return 1;
        }else{
            return '发布失败';
        }
    }

    public function search($param){
        $list = $this->where('text','like','%'.$param.'%')->with('wall')->select();
        return $list;
    }
  }
