<?php

namespace app\index\service;


use app\index\model\Student;

class StudentService implements Service
{
    private static $instance;

    public static function getInstance()
    {
        if(!(self::$instance instanceof self)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function addStudent($name, $specialtyId, $userId)
    {
        $student = new Student();
        $student->name = $name;
        $student->specialty_id = $specialtyId;
        $student->user_id = $userId;
        $student->save();
        return $student;
    }
}