<?php

namespace app\index\controller;

class MyTrainController extends BaseController
{
    public function index()
    {
        $user = $this->userService->getCurrentLoginUser();
        $trains = $this->trainService->getTrainsByUserId($user->id);
        $this->assign('trains', $trains);
        return $this->fetch();
    }
}