<?php

namespace app\index\controller;

use app\index\model\Course;
use app\index\utils\Status;

class CourseController extends BaseController
{
    public function index()
    {
        $courses = $this->courseService->getAllCourse();
        $this->assign('courses', $courses);
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
        $course->term_id = 0;
        $course->teacher_id = 0;
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

    public function edit()
    {
        $id = $this->request->param('id');
        $course = Course::get($id);
        $this->assign('course', $course);

        $terms = $this->termService->getAllTerm();
        $this->assign('terms', $terms);

        $teachers = $this->teacherService->getAllTeachers();
        $this->assign('teachers', $teachers);

        return $this->fetch('course/add');
    }

    public function update()
    {
        $id = $this->request->param('id');
        $name = $this->request->post('name');
        $courseCredit = $this->request->post('courseCredit');
        $experimentCredit = $this->request->post('experimentCredit');
        $assessment = $this->request->post('assessment');
        $termId = $this->request->post('termId');
        $teacherId = $this->request->post('teacherId');

        $result = $this->courseService->update($id, $name, $courseCredit, $experimentCredit, $assessment, $termId, $teacherId);
        if (Status::isSuccess($result['status'])) {
            $this->success($result['info'], 'course/index');
        } else {
            $this->error($result['info']);
        }
    }

    public function delete()
    {
        $id = $this->request->param('id');

        $result = $this->courseService->delete($id);
        if (Status::isSuccess($result['status'])) {
            $this->success($result['info'], 'course/index');
        } else {
            $this->error($result['info']);
        }
    }
}