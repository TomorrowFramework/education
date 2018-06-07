<?php

namespace app\index\controller;

class MyCourseController extends BaseController
{
    public function index()
    {
        $user = $this->userService->getCurrentLoginUser();
        $courses = $this->courseService->getCurrentCourseByUserId($user->id);
        $this->assign('courses', $courses);
        return $this->fetch();
    }
}