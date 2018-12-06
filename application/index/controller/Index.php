<?php
namespace app\index\controller;

use think\facade\Hook;
use think\Request;
use think\Controller;
use think\facade\Request as fRequest;

class Index extends Controller
{
    public function index()
    {
        $list = model('Content')->order('time','desc')->limit(20)->with('wall')->select();

        Hook::add("Filter","app\\index\\behavior\\Filter");
        $list = Hook::listen("Filter",$list)[0];
        $this->assign('infoList', $list);
        return view();
    }

    public function more(){
        $page = input("post.page");
        $list = model('Content')->order('time','desc')->page($page,20)->with('wall')->select();
        $this->assign('infoList',$list);
        $html = $this->fetch();
        return $html;
    }

    public function outwall($id){
        $content = model('Content')->where('id',$id)->with('wall')->find();
        $content['img'] = explode(',',$content['img']);
        $this->assign('content',$content);
        return view();

    }

    //我要表白，添加用户表白信息到数据库
    public function addInfo(Request $request)
    {
      if ($request->isPost()) {
            $data = [
                'nickname' => input('post.nickname'),
                'text' => input('post.text'),
                'sex' => (input('post.sex') == 'option1')?('男'):('女'),
                'file' => fRequest::has("img","file") ? $request->file("img") : "",
                'img' => '',
                "qq" =>"1",
                'time' => time()
            ];
            $result = model('Content')->addInfo($data);
            if ($result == 1) {
                return $this->redirect('index/index/index');
            } else {
                return $this->redirect('index/index/index');
            }
        }
    }

    //推荐墙，将用户推荐的墙添加进数据库
    public function addWall(Request $request)
    {
        if ($request->isAjax()) {
            $data = [
                'qq' => input('post.qq')
            ];
            $result = model('Wall')->addWall($data);
            if ($result == 1) {
                return json(['code' => 1, 'msg' => '提交成功','url' => 'www.biaobai.cn/index.php/index/index/index']);
            } else {
                return json(['code' => 0, 'msg' => $result]);
            }
        }
    }

    //搜索功能，返回含有搜索字段的content
    public function search($param)
    {
      $result = model('Content')->search($param);
      $this->assign('list', $result);
      return view();
        
    }
}
