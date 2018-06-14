<?php
namespace app\common\validate;
use think\Validate;

class Train extends Validate
{
    protected $rule = [
        'name' => 'require',
        'specialty_id' => 'require'
    ];

    protected $message  =   [
        'name.require' => '名称必须',
        'specialty_id' => '专业必须'
    ];
}