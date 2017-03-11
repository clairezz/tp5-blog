<?php
namespace app\index\controller;

use think\Request;
use app\index\model\Article;

class MainPage extends \think\Controller {
    function __construct(Request $request = null)
    {
        parent::__construct($request);
    }

    function index($username="") {
         $bob = array("title" => "Bob", "link" => "/index/main_page/show?id=1&username=" . $username);
         $rose = array("title" => "Rose", "link" => "/index/main_page/show?id=2&username=" . $username);
         $jack = array("title" => "Jack", "link" => "/index/main_page/show?id=3&username=" . $username);
         $list = array($bob, $jack, $rose);
        $this->assign('list',$list);
        $this->assign('username', $username);
        return $this->fetch("index");
    }

    function show($id, $username="") {
        $art = Article::get($id)['content'];
        return $this->fetch("showArticle", ['art' => $art, 'username' => $username]);
    }
}