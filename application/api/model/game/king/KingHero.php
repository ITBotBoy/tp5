<?php
/**
 * Created by PhpStorm
 * Author: 沁塵
 * Date: 2020/10/3
 * Time: 6:15 下午
 */

namespace app\api\model\game\king;


use think\Model;

class KingHero extends Model
{
    public static function searchKing($offset, $count, $params = [])
    {
        $List = self::withSearch(['name', 'type'], $params);
        $items= ($offset || $count)?$List->limit($offset, $count)->select():$List->select();
        $total = $List->count();
        return [
            'items' => $items,
            'total' => $total
        ];
    }
}