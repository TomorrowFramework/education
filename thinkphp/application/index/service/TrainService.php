<?php

namespace app\index\service;

use app\index\model\Train;
use app\index\model\TrainCourse;
use app\index\utils\Status;

class TrainService implements Service
{
    private static $instance;

    public static function getInstance()
    {
        if(!(self::$instance instanceof self)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getAllTrains()
    {
        return Train::all();
    }

    public function save($name, $specialtyId, $courseIds)
    {
        $train = new Train();
        $train->name = $name;
        $train->specialty_id = $specialtyId;
        if (false === $train->save()) {
            return Status::getErrorResult('培养计划保存失败');
        }

        if (!is_null($courseIds)) {
            $datas = [];
            foreach ($courseIds as $courseId) {
                $data = [];
                $data['train_id'] = $train->id;
                $data['course_id'] = $courseId;
                array_push($datas, $data);
            }

            if (!empty($datas)) {
                $trainCourse = new TrainCourse();
                if (!$trainCourse->saveAll($datas)) {
                    return Status::getErrorResult('培养计划相关课程信息保存失败');
                }
            }
        }

        return Status::getSuccessResult('保存成功');
    }

    public function delete($id)
    {
        $train = Train::get($id);
        if (!$train->delete()) {
            return Status::getErrorResult('删除失败');
        } else {
            return Status::getSuccessResult("删除成功");
        }
    }
}