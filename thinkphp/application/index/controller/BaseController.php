<?php

namespace app\index\controller;

use app\index\service\CourseService;
use app\index\service\SpecialtyService;
use app\index\service\StudentService;
use app\index\service\TeacherService;
use app\index\service\TermService;
use app\index\service\TrainService;
use think\Controller;
use think\Request;
use app\index\service\UserService;

/**
 * 基础控制器，用户权限验证
 */
class BaseController extends Controller
{
    protected $userService;
    protected $termService;
    protected $trainService;
    protected $courseService;
    protected $studentService;
    protected $teacherService;
    protected $specialtyService;

    function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->userService = UserService::getInstance();
        $this->termService = TermService::getInstance();
        $this->trainService = TrainService::getInstance();
        $this->courseService = CourseService::getInstance();
        $this->studentService = StudentService::getInstance();
        $this->teacherService = TeacherService::getInstance();
        $this->specialtyService = SpecialtyService::getInstance();

        $id = session('userId');
        if (is_null($id)) {
            $this->error('请先登录', 'login/index');
        }

        $user = $this->userService->getCurrentLoginUser();
        $this->assign('user', $user);
    }
}