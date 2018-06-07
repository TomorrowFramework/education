<?php

namespace app\index\controller;

use app\index\model\Train;
use app\index\utils\Status;

/**
 * 培养计划控制器
 * Class TrainController
 * @package app\index\controller
 */
class TrainController extends BaseController
{
    public function index()
    {
        $trains = $this->trainService->getAllTrains();
        $this->assign('trains', $trains);
        return $this->fetch();
    }

    public function add() {
        $train = new Train();
        $train->id = 0;
        $train->name = '';
        $train->specialty_id = 0;
        $specialtys = $this->specialtyService->getAllSpecialty();
        $courses = $this->courseService->getAllCourse();

        $this->assign('specialtys', $specialtys);
        $this->assign('courses', $courses);
        $this->assign('train', $train);

        return $this->fetch();
    }

    public function save() {
        $name = $this->request->post('name');
        $specialtyId = $this->request->post('specialtyId');
        $courseIds = $this->request->post('courseId/a');
        $result = $this->trainService->save($name, $specialtyId, $courseIds);
        if (Status::isSuccess($result['status'])) {
            $this->success($result['info'], 'train/index');
        } else {
            $this->error($result['info']);
        }
    }

    public function edit() {
        $id = $this->request->param('id');
        $train = Train::get($id);
        $specialtys = $this->specialtyService->getAllSpecialty();
        $courses = $this->courseService->getAllCourse();

        $this->assign('specialtys', $specialtys);
        $this->assign('courses', $courses);
        $this->assign('train', $train);
        return $this->fetch('add');
    }

    public function update() {
        $id = $this->request->param('id');
        $name = $this->request->post('name');
        $specialtyId = $this->request->post('specialtyId');
        $courseIds = $this->request->post('courseId/a');

        $result = $this->trainService->update($id, $name, $specialtyId, $courseIds);
        if (Status::isSuccess($result['status'])) {
            $this->success($result['info'], 'train/index');
        } else {
            $this->error($result['info']);
        }
    }

    public function delete() {
        $id = $this->request->param('id');
        $result = $this->trainService->delete($id);
        if (Status::isSuccess($result['status'])) {
            $this->success($result['info'], 'train/index');
        } else {
            $this->error($result['info']);
        }
    }
}