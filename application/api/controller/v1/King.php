<?php

namespace app\api\controller\v1;
use app\api\service\game\King as KingService;
use app\api\model\game\king\KingOne;
use app\api\model\game\king\KingTwo;
use app\api\model\game\king\KingThree;
use app\lib\exception\NotFoundException;
use LinCmsTp5\exception\ParameterException;
use app\lib\exception\RepeatException;
use think\facade\Hook;
use think\Request;
use think\response\Json;
function getModelMap($class){
    return array(new KingOne(),new KingTwo(),new KingThree())[$class];
}

class King
{
    /**
     * @api {delete} /v1/king/:class/:id 删除分类
     * @apiName deleteKing
     * @apiParam {Number} class 分类类型：0英雄分类，1出装分类，2铭文分类
     * @apiParam {Number} id
     * @apiVersion 1.0.0
     * @apiGroup 王者荣耀接口
     */
    /**
     * @param('id','id','require|number')
     * @param('class','class','require|number')
     */
    public function deleteKing($class,$id)
    {
        getModelMap($class)::destroy($id);
        return writeJson(201, '', '操作成功');
    }

    /**
     * @api {post} /v1/king 修改添加分类
     * @apiName saveKing
     * @apiVersion 1.0.0
     * @apiParam {Number} [id] 修改id,添加不传
     * @apiParam {Number} [parentId] 上级id
     * @apiParam {Number} modelId 模块类型：1王者荣耀
     * @apiParam {Number} class 分类类型：0英雄分类，1出装分类，2铭文分类
     * @apiParam {String} name 名称
     * @apiParam {String} type 层级
     * @apiParam {String} [description] 描述
     * @apiParam {String} [info] 分类信息，JSON字符串
     * @apiGroup 王者荣耀接口
     */
    /**
     * @validate('KingValidate')
     */
    public function saveKing(Request $request)
    {
        $params = $request->post();
        $class = $params['class'];
        $id=$params['id'] ?? null;
        if($id){
            /*$res=getModelMap($class)::get($id);
            if(!$res){
                throw new ParameterException([
                    'msg' => 'id不存在',
                ]);
            }else {

            }*/
            //修改分类
            getModelMap($class)->save($params, ['id' => $params['id']]);
        }else {
            //添加分类
//            this.getKing($params);
            getModelMap($class)::create($params);
        }
        return writeJson(201, '', '操作成功');
    }
    /**
     * @api {get} /v1/king 查询所有分类
     * @apiName getKing
     * @apiVersion 1.0.0
     * @apiParam {Number} modelId 模块类型：1王者荣耀
     * @apiParam {Number} [page] 分页页数
     * @apiParam {Number} [count] 分页数量
     * @apiParam {Number} [type] 层级
     * @apiParam {Number} class 分类类型：0英雄分类，1出装分类，2铭文分类
     * @apiParam {String} [name] 名称
     * @apiGroup 王者荣耀接口
     */
    /**
     * @param('class','class','require|number')
     */
    public function getKing(Request $request)
    {
        $modelId = $request->get('modelId');
        $class = $request->get('class');
        $type = $request->get('type');
        $name = $request->get('name');
        $page = $request->get('page/d');
        $count = $request->get('count/d');
        return KingService::searchKing($page,$count,$modelId,$class,$type,$name);
    }
    /**
     * @api {get} /v1/king/{class}/{id} 查询详细分类
     * @apiName getKingId
     * @apiParam {Number} class 分类类型：0英雄分类，1出装分类，2铭文分类
     * @apiParam {Number} id
     * @apiVersion 1.0.0
     * @apiGroup 王者荣耀接口
     */
    /**
     * @param('id','ID','require|number')
     * @param('class','class','require|number')
     */
    public function getKingId($class,$id)
    {
        return getModelMap($class)::get($id);
    }
}