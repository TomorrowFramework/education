<?php

namespace app\index\controller;

use app\index\model\Course;
use app\index\utils\Status;

class CourseController extends BaseController
{
    public function index()
    {
        return $this->fetch();
    }

    public function add()
    {
        $course = new Course();
        $course->id = 0;
        $course->name = '';
        $course->course_credit = '';
        $course->experiment_credit = '';
        $course->assessment = '';
        $this->assign('course', $course);

        $terms = $this->termService->getAllTerm();
        $this->assign('terms', $terms);

        $teachers = $this->teacherService->getAllTeachers();
        $this->assign('teachers', $teachers);

        return $this->fetch();
    }

    public function save()
    {
        $name = $this->request->post('name');
        $courseCredit = $this->request->post('courseCredit');
        $experimentCredit = $this->request->post('experimentCredit');
        $assessment = $this->request->post('assessment');
        $termId = $this->request->post('termId');
        $teacherId = $this->request->post('teacherId');
        $result = $this->courseService->save($name, $courseCredit, $experimentCredit, $assessment, $termId, $teacherId);
        if (Status::isSuccess($result['status'])) {
            $this->success($result['info'], 'course/index');
        } else {
            $this->error($result['info']);
        }
    }
}