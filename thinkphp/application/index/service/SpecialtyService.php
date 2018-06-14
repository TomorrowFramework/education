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

    public function getAllSpecialty()
    {
        return Specialty::all();
    }

    public function save($name)
    {
        $specialty = new Specialty();
        $specialty->name = $name;
        if (false === $specialty->validate(true)->save()) {
            return Status::getErrorResult($specialty->getError());
        } else {
            return Status::getSuccessResult("保存成功");
        }
    }

    public function update($id, $name)
    {
        $specialty = Specialty::get($id);
        $specialty->name = $name;
        if (false === $specialty->validate(true)->save()) {
            return Status::getErrorResult($specialty->getError());
        } else {
            return Status::getSuccessResult("更新成功");
        }
    }

    public function delete($id)
    {
        $specialty = Specialty::get($id);
        if (!$specialty->delete()) {
            return Status::getErrorResult('删除失败');
        } else {
            return Status::getSuccessResult("删除成功");
        }
    }
}