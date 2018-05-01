<?php

namespace app\index\service;

use app\index\model\Specialty;
use app\index\utils\Status;

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

    public function save($name)
    {
        $specialty = new Specialty();
        $specialty->name = $name;
        $specialty->save();
        return Status::getSuccessResult("保存成功");
    }

    public function update($id, $name)
    {
        $specialty = Specialty::get($id);
        $specialty->name = $name;
        $specialty->save();
        return Status::getSuccessResult("更新成功");
    }

    public function delete($id)
    {
        $specialty = Specialty::get($id);
        $specialty->delete();
        return Status::getSuccessResult("删除成功");
    }
}