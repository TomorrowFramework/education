<?php

namespace app\index\controller;

use think\Controller;

/**
 * 登录控制器
 * @author zhangxishuo
 */
class LoginController extends Controller
{
    /**
     * 登录首页
     */
    public function index()
    {
        return $this->fetch();
    }

    /**
     * 用户登录
     */
    public function login()
    {
        // 获取用户名和密码
        $username = $this->request->post('username');
        $password = $this->request->post('password');
    }
}