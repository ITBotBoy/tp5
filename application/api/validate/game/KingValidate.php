<?php
namespace app\api\validate\game;
use LinCmsTp5\validate\BaseValidate;

class KingValidate  extends BaseValidate{
    // 自定义验证规则
    protected $rule  =   [
        'class'   =>  "in:0,1,2",
        'modelId'=>  "number",
        'name'    =>  "require|checkUnique"
    ];
    protected function checkUnique($value,$rule,$data,$field)
    {
        $table=array('king_one','king_two','king_three');
        $rule = [
            'name'    =>  "unique:".$table[$data["class"]].",modelId^type",
        ];
        return $this->check($data,$rule) ?true:'同模块层级下分类名称重复';
    }
}