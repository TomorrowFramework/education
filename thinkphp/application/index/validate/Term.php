<?php
namespace app\common\validate;
use think\Validate;

class Term extends Validate
{
    protected $rule = [
        'name' => 'require',
        'start_time' => 'require',
        'end_time' => 'require'
    ];

    protected $message  =   [
        'name.require' => '名称必须',
        'start_time' => '起始时间必须',
        'end_time' => '结束时间必须'
    ];
}