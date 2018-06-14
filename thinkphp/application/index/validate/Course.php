<?php
namespace app\common\validate;
use think\Validate;

class Course extends Validate
{
    protected $rule = [
        'name' => 'require',
        'term_id' => 'require',
        'teacher_id' => 'require'
    ];

    protected $message  =   [
        'name.require' => '名称必须',
        'term_id.require' => '学期必须',
        'teacher_id.require' => '教师必须'
    ];
}