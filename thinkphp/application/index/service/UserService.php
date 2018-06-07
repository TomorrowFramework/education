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

    public function logout()
    {
        session('userId', null);
        return Status::getSuccessResult('注销成功');
    }

    public function getCurrentLoginUser()
    {
        $id = session('userId');
        if (!is_null($id)) {
            $user = User::get($id);
            return $user;
        } else {
            $user = new User();
            return $user;
        }
    }

    public function addUser($username, $password, $power)
    {
        $user = new User();
        $user->username = $username;
        $user->password = $password;
        $user->power    = $power;
        $user->save();
        return $user;
    }
}