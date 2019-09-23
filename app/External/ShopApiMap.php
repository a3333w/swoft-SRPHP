<?php
namespace App\External;

use Swoft\Bean\Annotation\Mapping\Bean;

/**
 * Class PrototypeClass
 *
 * @since 2.0
 *
 * @Bean()
 */
class ShopApiMap extends \App\Bean\ApiMap
{
    public function returnMap() :array {
       $uri = config('external_uri');//

        return [
            'getGoodsClass'=>$uri.'/index.php?g=Integral&m=WechatNoLogin&a=getGoodsClass&interface=1',

            'getGoodsList'=>$uri.'/index.php?g=Integral&m=WechatNoLogin&a=getGoodsList&interface=1',

            'getGoodsDetail'=>$uri.'/index.php?g=Wechat&m=Goods&a=getGoodsDetail&interface=1',

            'login'=>$uri.'/index.php?g=Integral&m=WechatNoLogin&a=login&interface=1',

            'addCart'=>$uri.'/index.php?g=Wechat&m=Around&a=generateAroundOrder&interface=1',

            'cartList'=>$uri.'/index.php?g=CustomerDemand&m=BlueCardLogic&a=getNoSkuInfo&interface=1',

            'generateOrder'=>$uri.'/index.php?g=CustomerDemand&m=BlueCardLogic&a=getGoodsNotice&interface=1',

            'userInfo'=>$uri.'/index.php?g=CustomerDemand&m=GoodsTemplateRegion&a=checkGoodsRegion&interface=1',

            'myOrder'=>$uri.'/index.php?g=CustomerDemand&m=GoodsTemplateRegion&a=checkGoodsRegion&interface=1',
        ];
    }

    public function getMap(string $map):string {
        return array_key_exists($map,self::returnMap()) ? self::returnMap()[$map] :'';
    }
}
