<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://swoft.org/docs
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

function user_func(): string
{
    return 'hello';
}

if (!function_exists('generateOrderSn')) {
    /**
     * Get OrderSn
     */
    function generateOrderSn() :string
    {
        return date('Ymd',time()).implode('',explode('.',microtime(true))).rand(100,999);
    }
}

/**
 * Created by PhpStorm.
 * User: liuqiaomu
 * Date: 2018/10/8
 * Time: 14:36
 */
if (! function_exists('psf')) {
    /**
     * 获取 psf 实例
     *
     * @param string $group
     * @return \App\Http\Controller\Psf
     */
    function psf(string $group = '')
    {
        /**
         * @see App\Tools\Psf
         */
        return Swoft::getBean('psf');
    }
}

if (! function_exists('grep')) {
    /**
     * 按正则规则判断是否匹配
     * Created by PhpStorm.
     * User: liuqiaomu
     * Date: 2019/8/21
     * Time: 14:36
     */
    function grep($rule, $str, $start, $length)
    {
        $uriSub = substr($str, $start, $length);                //字符串
        preg_match($rule, $uriSub, $matches);                   //正则匹配
        if (!empty($matches)) {                                //匹配成功1，0未成功
            return 1;
        }
        return 0;
    }
}


if(!function_exists('getSize')){
    /**
     * 给出byte转换单位大小
     * Created by PhpStorm.
     * User: liuqiaomu
     * Date: 2019/8/24
     * Time: 14:36
     */
    function getSize($size) {
        $units = array(' B', ' KB', ' MB', ' GB', ' TB');
        for ($i = 0; $size >= 1024 && $i < 4; $i++) $size /= 1024;
        return round($size, 2).$units[$i];
    }
}

if(!function_exists('systemConfig')){
    /**
     * 系统配置获取函数
     * Created by PhpStorm.
     * User: liuqiaomu
     * Date: 2019/9/5
     * Time: 14:36
     */
    function systemConfig($str) {
        return \Swoft\Db\DB::table('system_config')
            ->where('name',$str)
            ->first()['value'];
    }
}

if(!function_exists('exArray')){
    /**
     * 以为换行和符号分割数组
     * Created by PhpStorm.
     * User: liuqiaomu
     * Date: 2019/9/5
     * Time: 14:36
     */
    function exArray($str) {
        $arr = explode("\n",$str);
        $options = [];
        foreach ($arr as $value){
            $option = explode('-',$value);
            $options[$option[0]] = $option[1];
        }
        return $options;
    }
}

if(!function_exists('menuList')){
    /**
     * 菜单分级递归(用于前台分类树生成和权限分类显示)
     * Created by PhpStorm.
     * User: liuqiaomu
     * Date: 2019/9/6
     * Time: 14:36
     */
    function menuList($arr) {
        foreach ($arr as $key => $value) {
            $data = \Swoft\Db\DB::table('system_menu')
                ->where('pid',$value['id'])
                ->get();
            $data = \Swoft\Stdlib\Helper\ArrayHelper::toArray($data);
            if(!empty($data)){
                $arr[$key]['children'] = menuList($data);
            }else{
                $arr[$key]['children'] = [];
            }
        }
        return $arr;
    }
}


if(!function_exists('menuFirstPage')){
    /**
     * 菜单分级递归(用于前台分类树生成和权限分类显示)
     * Created by PhpStorm.
     * User: liuqiaomu
     * Date: 2019/9/6
     * Time: 14:36
     */
    function menuFirstPage($arr) {
        foreach ($arr as $key => $value) {
            $data = \Swoft\Db\DB::table('system_menu')
                ->where([
                    'pid'=>$value['id'],
                    'level' => 2
                ])
                ->get();
            $data = \Swoft\Stdlib\Helper\ArrayHelper::toArray($data);
            if(!empty($data)){
                $arr[$key]['children'] = menuFirstPage($data);
            }else{
                $arr[$key]['children'] = [];
            }
        }
        return $arr;
    }
}


if(!function_exists('treeCheck')){
    /**
     * 角色权限菜单(已分配权限的加修饰check)
     * Created by PhpStorm.
     * User: liuqiaomu
     * Date: 2019/9/10
     * Time: 14:36
     */
    function treeCheck($menuArr, $numArr) {
        foreach ($menuArr as $key => $value) {
            $menuArr[$key]['spread'] = 1;

            $data = \Swoft\Db\DB::table('system_menu')
                ->where('pid',$value['id'])
                ->get();
            $data = \Swoft\Stdlib\Helper\ArrayHelper::toArray($data);
            if(!empty($data)){
                $menuArr[$key]['children'] = treeCheck($data, $numArr);
                $menuArr[$key]['checked'] = 0;
            }else{
                $menuArr[$key]['children'] = [];
                if(in_array($value['id'],$numArr)){
                    $menuArr[$key]['checked'] = 1;
                }else{
                    $menuArr[$key]['checked'] = 0;
                }
            }
        }
        return $menuArr;
    }
}


if(!function_exists('inArrayColumn')){
    /**
     * 数组列里是否有这个值
     * @param array  $tokenApi
     * @param array  $roter
     * @param array  $search
     */
    function inArrayColumn($search, $tokenApi, $roter){
        //配置文件配用户需要验证token 的路由
        if(array_search($search, array_column($tokenApi, $roter)) !== false){
            return true;
        }
        return false;
    }
}

if(!function_exists('getToken')){
    /**
     * header里有token用headerd的反之用get里的
     * @param $request
     */
    function getToken(\Psr\Http\Message\ServerRequestInterface $request){
        $haderToken = $request->getHeaderLine("token");
        if(!empty($haderToken)){
            return $haderToken ;
        }
        return  $request->query('token');
    }
}

if(!function_exists('cloneConfig')){
    /**
     * clone config
     * @param string  $path
     */
    function cloneConfig($path)
    {
        $config = \Swoft::getBean('config');                     //获得配置对象
        $configClone = clone $config;                            //克隆配置对象
        $configClone->setPath($path);                             //设置克隆对象文件地址
        $configClone->init();                                     //初始化
        return $configClone;
    }
}


if(!function_exists('checkUri')){
    /**
     * 比对路由权限
     * @param string  $path
     */
    function checkUri($path)
    {
        return \Swoft\Db\DB::table('system_menu')
            ->where('url',$path)
            ->first(['id']);
    }
}

if(!function_exists('object_array')) {

    function object_array($array)
    {
        if (is_object($array)) {
            $array = (array)$array;
        }
        if (is_array($array)) {
            foreach ($array as $key => $value) {
                $array[$key] = object_array($value);
            }
        }
        return $array;
    }
}