<?php declare(strict_types=1);

namespace App\Logic\System\V1\Config;

use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Db\DB;
use Swoft\Http\Message\Request;
use Swoft\Http\Message\Response;

/**
 * Class ConfigRelevantClass
 * @since 2.0
 * @Bean(name="configrelevant", scope=Bean::PROTOTYPE)
 */
class ConfigRelevantLogic
{
    /**
     * 请求数据
     *
     * @var array
     */
    private $data = [];

    /**
     * 魔术方法 中转调用方法
     * @param $response
     * @param $request
     * @param $method 调用的方法
     * @return bool
     * @author liuqiaomu
     */
    public function __invoke(Response $response,Request $request, $method)
    {
        //进入需要调用得方法
        return $this->$method($response, $request);
    }

    /**
     * 写入配置
     * @param Response $response
     * @param Request $request
     * @author liuqiaomu
     */
    public function create(Response $response,Request $request)
    {
        $data = $request->query()['data'];
        if($data['group'] == ( 'base' || 'system' || 'upload' || 'databases' )){
            $data['system'] = 1;
        }
        //配置入库
        return psf()->call(
            "Config.ConfigData::create",
            [
                $data,
            ]
        )->getResult();
    }

    /**
     * 获得配置管理分组
     * @param $response
     * @param $request
     * @return bool
     * @author liuqiaomu
     */
    public function getConfigTitle( $response, $request)
    {
        return include( strval(env('SWOFT_PATH')) .'/config/configtitle.php');
    }

    /**
     * 写入配置管理分组
     * @param $response
     * @param $request
     * @return bool
     * @author liuqiaomu
     */
    public function writeConfigTitle( $response, $request)
    {
        $configName = $request->query('data')['configName'];
        $arr = explode('-',$configName);
        $arr = [
            $arr[0] => $arr[1]
        ];
        $configList = include( strval(env('SWOFT_PATH')) .'/config/configtitle.php');
        $configList = array_merge($configList, $arr);
        $file=strval(env('SWOFT_PATH')) .'/config/configtitle.php';
        $text='<?php return '.var_export($configList,true).';';
        if(false!==fopen($file,'w+')){
            file_put_contents($file,$text);
        }
        return true;
    }


    /**
     * 获取分组配置
     * @param $response
     * @param $request
     * @return bool
     * @author liuqiaomu
     */
    public function getConfigList( $response, $request)
    {

        $limit = $request->query()['limit']; //分页数
        $curr  = $request->query()['curr'];  //当前页
        if(isset($request->query()['group'])){
            $where = [
                'group' =>$request->query()['group'],
            ];
        }else{
            $where = [];
        }

        //获得模块列表
        return psf()->call(
            "Config.ConfigData::getLimit",
            [
                $limit,$curr,$where
            ]
        )->getResult();
    }

    /**
     * 获取总共条数
     * @param $response
     * @param $request
     * @return bool
     * @author liuqiaomu
     */
    public function getCount(Response $response,Request $request)
    {
        if(isset($request->query()['group'])){
            $where = [
                'group' => $request->query()['group']
                ];
        }else{
            $where = null;
        }
        return psf()->call(
            "Config.ConfigData::getCount",
            [
                $where
            ]
        )->getResult();
    }


    /**
     * 获得列表
     * @param $response
     * @param $request
     * @return bool
     * @author liuqiaomu
     */
    public function getList(Response $response,Request $request)
    {
        $data = $request->query();
        if(isset($data['group'])){
            $where = [
                'group' => $data['group']
            ];
        }else{
            $where = [];
        }

        if(isset($data['limit']) && isset($data['curr'])){
            $limit = $data['limit']; //分页数
            $curr  = $data['curr'];  //当前页
        }else{
            $limit = 0; //分页数
            $curr  = 0;  //当前页
        }




        return psf()->call(
            "Config.ConfigData::getlist",
            [
                $limit,$curr,$where
            ]
        )->getResult();
    }

    /**
     * 获得单个配置
     * @param Response $response
     * @param Request $request
     * @author liuqiaomu
     */
    public function editFindConfig(Response $response,Request $request)
    {
        $id =$request->query('id');
        return psf()->call(
            "Config.ConfigData::getConfig",
            [
                $id
            ]
        )->getResult();
    }

    /**
     * 修改单个配置
     * @param Response $response
     * @param Request $request
     * @author liuqiaomu
     */
    public function editConfig(Response $response,Request $request)
    {
        $id = $request->query('id');
        $data = $request->query('data');
        return psf()->call(
            "Config.ConfigData::editConfig",
            [
                $id,$data
            ]
        )->getResult();
    }


    /**
     * 删除单个配置
     * @param Response $response
     * @param Request $request
     * @author liuqiaomu
     */
    public function deleteConfig(Response $response,Request $request)
    {
        $id = $request->query('id');
        return psf()->call(
            "Config.ConfigData::deleteConfig",
            [
                $id
            ]
        )->getResult();
    }

    /**
     * 系统配置批量修改
     * @param Response $response
     * @param Request $request
     */
    public function systemConfigEdit(Response $response,Request $request)
    {
        $data = $request->query('input');
        DB::beginTransaction();
        if(isset($data['config_group'])){
            $array = exArray($data['config_group']);
            $configList = include( strval(env('SWOFT_PATH')) .'/config/configtitle.php');
            $configList = array_merge($configList, $array);
            $file=strval(env('SWOFT_PATH')) .'/config/configtitle.php';
            $text='<?php return '.var_export($configList,true).';';
            if(false!==fopen($file,'w+')){
                file_put_contents($file,$text);
            }
        }
        $bool = psf()->call(
            "Config.ConfigData::systemConfigEdit",
            [
                $data
            ]
        )->getResult();
        DB::commit();
        return $bool;
    }
}