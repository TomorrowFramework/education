<?php

namespace app\index\controller;

use think\Controller;

/**
 * 登录控制器
 * @author zhangxishuo
 */
class LoginController extends Controller
{
    public function login()
    {
        return $this->fetch();
    }
}