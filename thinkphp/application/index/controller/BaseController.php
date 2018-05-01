<?php

namespace app\index\controller;

use app\index\service\SpecialtyService;
use think\Controller;
use think\Request;
use app\index\service\UserService;

/**
 * 基础控制器，用户权限验证
 */
class BaseController extends Controller
{
    protected $userService;
    protected $specialtyService;

    function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->userService = UserService::getInstance();
        $this->specialtyService = SpecialtyService::getInstance();

        $currentUser = $this->userService->getCurrentLoginUser();
        $this->assign('user', $currentUser);
    }
}