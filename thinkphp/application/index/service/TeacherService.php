<?php

namespace app\index\service;

use app\index\model\Teacher;

/**
 * 教师服务
 */
class TeacherService implements Service
{
    private static $instance;

    public static function getInstance()
    {
        if(!(self::$instance instanceof self)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function addTeacher($name)
    {
        $teacher = new Teacher();
        $teacher->name = $name;
        $teacher->save();
        return $teacher;
    }
}