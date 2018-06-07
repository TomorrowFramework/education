<?php

namespace app\index\model;

use think\Model;

class Train extends Model
{
    public function specialty()
    {
        return $this->belongsTo('Specialty');
    }
}