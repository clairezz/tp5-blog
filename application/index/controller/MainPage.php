<?php
namespace app\index\controller;

use app\admin\model\User;
use think\Request;
use app\index\model\Article;
use \think\Session;
use think\log;

class MainPage extends \think\Controller {
    function __construct(Request $request = null)
    {
        parent::__construct($request);
    }

    function index() {
        if(! Session::has('username')) {
            $this->error('请先登录', '/admin/index/login');
        }
        /* 查询该用户的文章列表 */
        $user = User::get(['name' => Session::get('username')]);
        $arts = Article::all(['author_id' => $user['id']]);
        Log::record('username: ' . $user, 'debug');
        $list = [];
        foreach ($arts as $art){
            $art['link'] = '/index/main_page/show?id=' . $art['id']; // 生成文章详情链接
            $list[] = $art;
        }
        $this->assign('list',$list);

        return $this->fetch("index");
    }

    function show($id) {
        $art = Article::get($id);
        return $this->fetch("showArticle", ['art' => $art]);
    }
}