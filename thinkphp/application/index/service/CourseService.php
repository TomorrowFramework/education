<?php

namespace app\index\service;

use app\index\model\Course;
use app\index\utils\Status;

class CourseService implements Service
{
    private static $instance;
    private $termService;

    function __construct()
    {
        $this->termService = TermService::getInstance();
    }

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

    public function delete($id)
    {
        $course = Course::get($id);
        if (!$course->delete()) {
            return Status::getErrorResult('删除失败');
        } else {
            return Status::getSuccessResult("删除成功");
        }
    }

    public function getCurrentCourses()
    {
        $term = $this->termService->getCurrentTerm();
        $termId = $term->id;
        $courses = Course::where('term_id', '=', $termId)->select();
        return $courses;
    }
}