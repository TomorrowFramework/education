<?php

namespace app\index\service;

use app\index\model\Course;
use app\index\utils\Status;

class CourseService implements Service
{
    private static $instance;

    public static function getInstance()
    {
        if(!(self::$instance instanceof self)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getAllCourse()
    {
        return Course::all();
    }

    public function save($name, $courseCredit, $experimentCredit, $assessment, $termId, $teacherId)
    {
        $course = new Course();
        $course->name = $name;
        $course->course_credit = $courseCredit;
        $course->experiment_credit = $experimentCredit;
        $course->assessment = $assessment;
        $course->term_id = $termId;
        $course->teacher_id = $teacherId;
        if (false === $course->save()) {
            return Status::getErrorResult('保存失败');
        } else {
            return Status::getSuccessResult('保存成功');
        }
    }

    public function update($id, $name, $courseCredit, $experimentCredit, $assessment, $termId, $teacherId)
    {
        $course = Course::get($id);
        $course->name = $name;
        $course->course_credit = $courseCredit;
        $course->experiment_credit = $experimentCredit;
        $course->assessment = $assessment;
        $course->term_id = $termId;
        $course->teacher_id = $teacherId;
        if (false === $course->save()) {
            return Status::getErrorResult('更新失败');
        } else {
            return Status::getSuccessResult('更新成功');
        }
    }
}