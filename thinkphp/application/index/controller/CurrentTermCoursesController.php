<?php

namespace app\index\controller;

class CurrentTermCoursesController extends BaseController
{
    public function index()
    {
        $courses = $this->courseService->getCurrentCourses();
        $this->assign('courses', $courses);
        return $this->fetch();
    }
}