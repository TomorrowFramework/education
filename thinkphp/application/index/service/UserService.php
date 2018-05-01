<?php

namespace app\index\service;

use app\index\model\User;
use app\index\utils\Status;

/**
 * 用户服务
 */
class UserService implements Service
{

    private static $instance;

    public static function getInstance()
    {
        if(!(self::$instance instanceof self)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * 用户登录
     * @param $username
     * @param $password
     * @return array
     */
    public function login($username, $password)
    {
        $map = [];
        $map['username'] = $username;
        $map['password'] = $password;

        $user = User::get($map);
        if (is_null($user)) {
            return Status::getErrorResult('用户名或密码错误');
        } else {
            session('userId', $user->id);
            return Status::getSuccessResult('登录成功');
        }
    }
}