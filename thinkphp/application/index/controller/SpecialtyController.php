<?php

namespace app\index\controller;

/**
 * 专业管理控制器
 */
class SpecialtyController extends BaseController
{
    public function index()
    {
        $specialty = $this->specialtyService->getAllSpecialty();
        $this->assign('specialty', $specialty);
        return $this->fetch();
    }
}