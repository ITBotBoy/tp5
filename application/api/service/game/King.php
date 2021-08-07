<?php

namespace app\api\service\game;

use app\api\model\game\king\KingHero;
use app\api\model\game\king\KingInscription;
use app\api\model\game\king\KingOutfit;
function getModelMap($class){
    return array(new KingHero(),new KingOutfit(),new KingInscription())[$class];
}


use think\Model;
class King extends Model
{
    public static function searchKing($page,$count,$class,$type,$name)
    {
        if($count || $page){
            list($offset, $count) = paginate($count, $page);
        }else {
            $offset=0;
        }

        $params = ['name' => $name, 'type' => $type];

        $res =  getModelMap($class)::searchKing($offset, $count,$params);

        return [
            'items' => $res['items'],
            'count' => $count,
            'page' => $page,
            'total' => $res['total']
        ];
    }
}