<?php

namespace app\index\service;

use app\index\model\Term;
use app\index\utils\Status;

class TermService implements Service
{
    private static $instance;

    public static function getInstance()
    {
        if(!(self::$instance instanceof self)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getAllTerm()
    {
        return Term::all();
    }

    public function save($name, $startTime, $endTime)
    {
        $term = new Term();
        $term->name = $name;
        $term->start_time = $startTime;
        $term->end_time = $endTime;
        if (false === $term->save()) {
            return Status::getErrorResult('保存失败');
        } else {
            return Status::getSuccessResult('保存成功');
        }
    }

    public function update($id, $name, $startTime, $endTime)
    {
        $term = Term::get($id);
        $term->name = $name;
        $term->start_time = $startTime;
        $term->end_time = $endTime;
        if (false === $term->save()) {
            return Status::getErrorResult('更新失败');
        } else {
            return Status::getSuccessResult('更新成功');
        }
    }

    public function delete($id)
    {
        $term = Term::get($id);
        if (!$term->delete()) {
            return Status::getErrorResult('删除失败');
        } else {
            return Status::getSuccessResult("删除成功");
        }
    }

    public function active($id)
    {
        $this->disable();
        $term = Term::get($id);
        $term->is_current = true;
        if (false === $term->save()) {
            return Status::getErrorResult('设置失败');
        } else {
            return Status::getSuccessResult("设置成功");
        }
    }

    private function disable()
    {
        $terms = $this->getAllTerm();
        foreach ($terms as $term) {
            if ($term->is_current) {
                $term->is_current = false;
                $term->save();
            }
        }
    }
}