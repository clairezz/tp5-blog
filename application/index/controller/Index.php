<?php
namespace app\index\controller;

use app\index\model\User;
use think\Controller;

class Index extends Controller
{
    public function index($username="")
    {
        return $this->fetch('index', ["username" => $username]);
    }

    public function about()
    {
        return $this->fetch('abouts');
    }

    public function contact()
    {
        return $this->fetch('contact');
    }
}

