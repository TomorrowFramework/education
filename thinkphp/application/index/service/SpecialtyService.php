<?php

namespace app\index\service;

use app\index\model\Specialty;

/**
 * 专业服务
 */
class SpecialtyService implements Service
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
     * 获取所有专业
     * @return false|static[]
     */
    public function getAllSpecialty()
    {
        return Specialty::all();
    }
}