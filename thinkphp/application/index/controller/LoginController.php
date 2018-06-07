<?php

namespace app\index\controller;

use app\index\service\CourseService;
use app\index\service\SpecialtyService;
use app\index\service\StudentService;
use app\index\service\TeacherService;
use app\index\service\TermService;
use app\index\service\UserService;
use app\index\utils\Status;
use think\Controller;
use think\Request;

/**
 * 登录控制器
 * @author zhangxishuo
 */
class LoginController extends Controller
{

    protected $userService;
    protected $termService;
    protected $courseService;
    protected $studentService;
    protected $teacherService;
    protected $specialtyService;

    function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->userService = UserService::getInstance();
        $this->termService = TermService::getInstance();
        $this->courseService = CourseService::getInstance();
        $this->studentService = StudentService::getInstance();
        $this->teacherService = TeacherService::getInstance();
        $this->specialtyService = SpecialtyService::getInstance();
    }

    /**
     * 登录首页
     */
    public function index()
    {
        return $this->fetch();
    }

    /**
     * 注册首页
     */
    public function register()
    {
        $specialty = $this->specialtyService->getAllSpecialty();
        $this->assign('specialty', $specialty);
        return $this->fetch();
    }

    /**
     * 用户登录
     */
    public function login()
    {
        $username = $this->request->post('username');
        $password = $this->request->post('password');
        $result = $this->userService->login($username, $password);
        if (Status::isSuccess($result['status'])) {
            $this->success($result['info'], 'index/index');
        } else {
            $this->error($result['info'], 'login/index');
        }
    }

    /**
     * 用户注销
     */
    public function logout()
    {
        $result = $this->userService->logout();
        if (Status::isSuccess($result['status'])) {
            $this->success($result['info'], 'login/index');
        }
    }

    /**
     * 用户注册
     */
    public function enroll()
    {
        $username   = $this->request->post('username');
        $password   = $this->request->post('password');
        $name       = $this->request->post('name');
        $profession = $this->request->post('profession');

        $user = $this->userService->addUser($username, $password, $profession);

        if ($profession == 0) {
            // 教师
            $this->teacherService->addTeacher($name, $user->id);
        } else if ($profession == -1) {
            // 学生
            $specialtyId = $this->request->post('specialty');
            $this->studentService->addStudent($name, $specialtyId, $user->id);
        }

        $this->success('注册成功', 'login/index');
    }
}