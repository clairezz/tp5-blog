<?php
namespace app\index\controller;

use think\Request;
use app\index\model\Article;
use \think\Session;

class MainPage extends \think\Controller {
    function __construct(Request $request = null)
    {
        parent::__construct($request);
    }

    function index($username="") {
        $arts = Article::all();
        foreach ($arts as $art){
            $art['link'] = '/index/main_page/show?id=' . $art['id'] . '&username=' . $username;
            $list[] = $art;
        }
        $this->assign('list',$list);
        $this->assign('username', Session::get('username'));
        return $this->fetch("index");
    }

    function show($id, $username="") {
        $art = Article::get($id);
        return $this->fetch("showArticle", ['art' => $art, 'username' => $username]);
    }
}