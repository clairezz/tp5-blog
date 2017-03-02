<?php
namespace app\index\controller;

use app\index\model\User;
use think\Controller;

class Index extends Controller
{
    public function index()
    {
        return $this->fetch('index');
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

