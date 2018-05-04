<?php

namespace app\index\controller;


class CourseController extends BaseController
{
    public function index()
    {
        return $this->fetch();
    }
}