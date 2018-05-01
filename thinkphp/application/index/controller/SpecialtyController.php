<?php

namespace app\index\controller;

use app\index\model\Specialty;
use app\index\utils\Status;

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

    public function add()
    {
        $specialty = new Specialty();
        $specialty->id = 0;
        $specialty->name = '';
        $this->assign('specialty', $specialty);
        return $this->fetch();
    }

    public function save()
    {
        $name = $this->request->post('name');
        $result = $this->specialtyService->save($name);
        if (Status::isSuccess($result['status'])) {
            $this->success($result['info'], 'specialty/index');
        }
    }

    public function edit()
    {
        $id = $this->request->param('id');
        $specialty = Specialty::get($id);
        $this->assign('specialty', $specialty);
        return $this->fetch('specialty/add');
    }

    public function update()
    {
        $id = $this->request->param('id');
        $name = $this->request->post('name');
        $result = $this->specialtyService->update($id, $name);
        if (Status::isSuccess($result['status'])) {
            $this->success($result['info'], 'specialty/index');
        }
    }

    public function delete()
    {
        $id = $this->request->param('id');
        $result = $this->specialtyService->delete($id);
        if (Status::isSuccess($result['status'])) {
            $this->success($result['info'], 'specialty/index');
        }
    }
}