<?php

namespace app\index\controller;

/**
 * 仪表盘控制器
 */
class IndexController extends BaseController
{
    public function index()
    {
        return $this->fetch();
    }
}