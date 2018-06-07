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

    public function addTeacher($name, $userId)
    {
        $teacher = new Teacher();
        $teacher->name = $name;
        $teacher->user_id = $userId;
        $teacher->save();
        return $teacher;
    }

    public function getAllTeachers()
    {
        return Teacher::all();
    }
}