<?php

namespace app\index\utils;

class Status
{
    public static $success = 'success';
    public static $error = 'error';

    public static function isSuccess($info)
    {
        if ($info === self::$success) {
            return true;
        } else {
            return false;
        }
    }

    public static function getSuccessResult($info)
    {
        $result = [];
        $result['status'] = self::$success;
        $result['info']   = $info;
        return $result;
    }

    public static function getErrorResult($info)
    {
        $result = [];
        $result['status'] = self::$error;
        $result['info']   = $info;
        return $result;
    }
}