<?php

namespace app\api\service\game;

use app\api\model\game\king\KingOne;
use app\api\model\game\king\KingThree;
use app\api\model\game\king\KingTwo;
function getModelMap($class){
    return array(new KingOne(),new KingTwo(),new KingThree())[$class];
}


use think\Model;
class King extends Model
{
    public static function searchKing($page,$count,$modelId,$class,$type,$name)
    {
        if($count || $page){
            list($offset, $count) = paginate($count, $page);
        }else {
            $offset=0;
        }

        $params = ['name' => $name, 'type' => $type,'modelId'=>$modelId];

        $res =  getModelMap($class)::searchKing($offset, $count,$params);

        return [
            'items' => $res['items'],
            'count' => $count,
            'page' => $page,
            'total' => $res['total']
        ];
    }
}