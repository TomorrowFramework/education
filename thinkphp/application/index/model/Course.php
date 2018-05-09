<?php

namespace app\index\model;


use think\Model;

class Course extends Model
{
    public function teacher()
    {
        return $this->belongsTo('Teacher');
    }

    public function term()
    {
        return $this->belongsTo('Term');
    }
}