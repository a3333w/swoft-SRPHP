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
class ExchangeApiMap extends \App\Bean\ApiMap
{
    public function returnMap() :array {
       $uri = config('external_uri');

       return [
           'blessInfo'=>$uri.'/index.php?g=Wechat&m=Package&a=getAroundBlessInfo&interface=1',
           'getPackageInfo'=>$uri.'/index.php?g=Wechat&m=Package&a=getYearPackageInfo&interface=1',
           'getGoodsDetail'=>$uri.'/index.php?g=Wechat&m=Goods&a=getGoodsDetail&interface=1',
           'checkAccountPwd'=>$uri.'/index.php?g=Wechat&m=Number&a=checkAccountPwd&interface=1',
           'generateAroundOrder'=>$uri.'/index.php?g=Wechat&m=Around&a=generateAroundOrder&interface=1',
           'getNoSkuInfo'=>$uri.'/index.php?g=CustomerDemand&m=BlueCardLogic&a=getNoSkuInfo&interface=1',
           'getGoodsNotice'=>$uri.'/index.php?g=CustomerDemand&m=BlueCardLogic&a=getGoodsNotice&interface=1',
           'checkGoodsRegion'=>$uri.'/index.php?g=CustomerDemand&m=GoodsTemplateRegion&a=checkGoodsRegion&interface=1',

       ];
    }

    public function getMap(string $map):string {
        return array_key_exists($map,self::returnMap()) ? self::returnMap()[$map] :'';
    }
}
