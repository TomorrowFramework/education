<?php
namespace app\common\validate;
use think\Validate;

class Specialty extends Validate
{
    protected $rule = [
        'name' => 'require'
    ];

    protected $message  =   [
        'name.require' => '名称必须'
    ];
}