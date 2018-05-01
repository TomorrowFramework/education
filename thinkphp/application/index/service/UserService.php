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

    /**
     * 用户注销
     * @return array
     */
    public function logout()
    {
        session('userId', null);
        return Status::getSuccessResult('注销成功');
    }

    /**
     * 获取当前登录用户
     * @return User|static
     */
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

    /**
     * 添加用户
     * @param $username
     * @param $password
     * @param $power
     * @param $relationId
     * @return array
     */
    public function addUser($username, $password, $power, $relationId)
    {
        $user = new User();
        $user->username = $username;
        $user->password = $password;
        $user->power    = $power;
        $user->relation_id = $relationId;
        $user->save();
        return Status::getSuccessResult('注册成功');
    }
}