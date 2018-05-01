<?php

namespace app\index\controller;

use app\index\service\SpecialtyService;
use app\index\service\StudentService;
use app\index\service\TeacherService;
use think\Controller;
use think\Request;
use app\index\service\UserService;

/**
 * 基础控制器，用户权限验证
 */
class BaseController extends Controller
{
    protected $userService;
    protected $studentService;
    protected $teacherService;
    protected $specialtyService;

    function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->userService = UserService::getInstance();
        $this->studentService = StudentService::getInstance();
        $this->teacherService = TeacherService::getInstance();
        $this->specialtyService = SpecialtyService::getInstance();

        $currentUser = $this->userService->getCurrentLoginUser();
        $this->assign('user', $currentUser);
    }
}