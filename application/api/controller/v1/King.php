<?php

namespace app\api\controller\v1;
use app\api\service\game\King as KingService;
use app\api\model\game\king\KingHero;
use app\api\model\game\king\KingOutfit;
use app\api\model\game\king\KingInscription;
use LinCmsTp5\exception\ParameterException;
use think\facade\Hook;
use think\Request;
use think\response\Json;
function getModelMap($class){
    return array(new KingHero(),new KingOutfit(),new KingInscription())[$class];
}

class King
{
    /**
     * @api {get} /v1/king 查询所有分类
     * @apiDescription class（0铭文分类，1出装分类，2英雄分类）
     * @apiName getAllKing
     * @apiVersion 1.0.0
     * @apiParam {number} [page] 分页页数
     * @apiParam {number} [count] 分页数量
     * @apiParam {number} [type] 层级
     * @apiParam {number} class 分类
     * @apiParam {string} [name] 名称
     * @apiGroup 王者荣耀接口
     */

    public function getAllKing(Request $request)
    {
        $class = $request->get('class');
        $type = $request->get('type');
        $name = $request->get('name');
        $page = $request->get('page/d');
        $count = $request->get('count/d');
        if(!is_numeric($class)){
            throw new ParameterException([
                'msg' => 'class参数不能为空',
            ]);
        }
        return KingService::searchKing($page,$count,$class,$type,$name);
    }
    /**
     * @api {get} /v1/king/:class/:id 查询详细分类
     * @apiDescription class（0铭文分类，1出装分类，2英雄分类）
     * @apiName getKing
     * @apiVersion 1.0.0
     * @apiGroup 王者荣耀接口
     */

    public function getKing($class,$id)
    {
        if(!is_numeric($class) || !is_numeric($id)){
            throw new ParameterException();
        }
        return getModelMap($class)::get($id);
    }


}