<?php

namespace app\index\controller;

use app\index\utils\Status;
use think\Controller;
use app\index\service\UserService;

/**
 * 登录控制器
 * @author zhangxishuo
 */
class LoginController extends Controller
{
    private $userService;

    function __construct()
    {
        parent::__construct();
        $this->userService = UserService::getInstance();
    }

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
        $username = $this->request->post('username');
        $password = $this->request->post('password');
        $result = $this->userService->login($username, $password);
        if (Status::isSuccess($result['status'])) {
            $this->success($result['info'], 'index/index');
        } else {
            $this->error($result['info'], 'login/index');
        }
    }
}