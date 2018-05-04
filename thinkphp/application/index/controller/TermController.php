<?php

namespace app\index\controller;

use app\index\model\Term;
use app\index\utils\Status;

class TermController extends BaseController
{
	public function index()
	{
	    $terms = $this->termService->getAllTerm();
	    $this->assign('terms', $terms);
		return $this->fetch();
	}

	public function add()
    {
        $term = new Term();
        $term->id = 0;
        $term->name = '';
        $term->start_time = '';
        $term->end_time = '';
        $this->assign('term', $term);
        return $this->fetch();
    }

    public function save()
    {
        $name = $this->request->post('name');
        $startTime = $this->request->post('startTime');
        $endTime = $this->request->post('endTime');
        $result = $this->termService->save($name, $startTime, $endTime);
        if (Status::isSuccess($result['status'])) {
            $this->success($result['info'], 'term/index');
        } else {
            $this->error($result['info']);
        }
    }

    public function edit()
    {
        $id = $this->request->param('id');
        $term = Term::get($id);
        $this->assign('term', $term);
        return $this->fetch('term/add');
    }

    public function update()
    {
        $id = $this->request->param('id');
        $name = $this->request->post('name');
        $startTime = $this->request->post('startTime');
        $endTime = $this->request->post('endTime');
        $result = $this->termService->update($id, $name, $startTime, $endTime);
        if (Status::isSuccess($result['status'])) {
            $this->success($result['info'], 'term/index');
        } else {
            $this->error($result['info']);
        }
    }

    public function delete()
    {
        $id = $this->request->param('id');
        $result = $this->termService->delete($id);
        if (Status::isSuccess($result['status'])) {
            $this->success($result['info'], 'term/index');
        } else {
            $this->error($result['info']);
        }
    }

    public function active()
    {
        $id = $this->request->param('id');
        $result = $this->termService->active($id);
        if (Status::isSuccess($result['status'])) {
            $this->success($result['info'], 'term/index');
        } else {
            $this->error($result['info']);
        }
    }
}