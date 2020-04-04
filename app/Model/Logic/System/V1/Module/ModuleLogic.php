<?php declare(strict_types=1);

namespace App\Model\Logic\System\V1\Module;

use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Db\DB;
use Swoft\Http\Message\Request;
use Swoft\Http\Message\Response;

/**
 * Class ModuleLogicClass
 * @since 2.0
 * @Bean(name="module", scope=Bean::PROTOTYPE)
 */
class ModuleLogic
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
     * 新增模块逻辑
     * @param $response
     * @param $request
     * @return bool
     * @author liuqiaomu
     */
    public function create( $response, $request)
    {
        $data = $request->query()['data'];
        //事务开始
        DB::beginTransaction();
        $data = [
            'system' => 2,
            'name'   => $data['moduleName'],    //模块名称
            'title'  => $data['moduleTitle'],   //模块标题
            'intro'  => $data['describe'],      //模块简介
            'author' => $data['author'],        //模块作者
            'version'=> $data['version'],       //模块版本
            'identifier' => $data['moduleTag'],//模块标签
            'config'     => strval(env('SWOFT_PATH')) .'/config/'.$data['moduleName'].'/' //模块配置文件夹
        ];

        //模块入库
        $boll = psf()->call(
            "Module.ModuleData::create",
            [
                $data,
            ]
        )->getResult();
        if($boll){
            //创建模块相关文件
            $arr = [
                'apiPath' => strval(env('SWOFT_PATH')) . '/app/Http/Controller/Api/Local/' . strval(env('SYSTEM_VERSION')) . '/' . $data['name'],
                'DataPath' =>  strval(env('SWOFT_PATH')) .'/app/Model/Lanka/Local/'.$data['name'].'/Data',
                'DaoPath' =>  strval(env('SWOFT_PATH')) .'/app/Model/Lanka/Local/'.$data['name'].'/Dao',
                'EnumPath' =>  strval(env('SWOFT_PATH')) .'/app/Model/Lanka/Local/'.$data['name'].'/Enum',
                'logicPath' =>  strval(env('SWOFT_PATH')) .'/app/Model/Logic/Local/'. strval(env('SYSTEM_VERSION')).'/'.$data['name'],
                'configPath' => strval(env('SWOFT_PATH')) .'/config/'.$data['name'],
                'configFile' => strval(env('SWOFT_PATH')) .'/config/'.$data['name'].'/base.php',
                ];
            foreach ($arr as $key => $value){
                $str=substr($key,-4);
                if($str != 'File'){
                    mkdir($value,0777,true);
                }else {
                    $myfile = fopen($arr[$key], 'w') or throwException("创建模块失败");
                    $txt = "<?php \n return [\n 'moduleName' => '" . $data['name'] . "'\n ];\n";
                    fwrite($myfile, $txt);
                    fclose($myfile);
                }
            }
            //将新增模块写入配置文件
            $configList = include( strval(env('SWOFT_PATH')) .'/config/module.php');
            $configList[$data['title']] = $data['name'];
            $file=strval(env('SWOFT_PATH')) .'/config/module.php';
            $text='<?php return '.var_export($configList,true).';';
            if(false!==fopen($file,'w+')){
                file_put_contents($file,$text);
            }
        }
        //事务提交，成功true
        DB::commit();
        return true;

    }


    /**
     * 获得模块列表
     * @param $response
     * @param $request
     * @return array
     * @author liuqiaomu
     */
    public function getList( $response, $request)
    {
        $limit = $request->query()['limit']; //分页数
        $curr  = $request->query()['curr'];  //当前页
        
        //获得模块列表
        $list = psf()->call(
            "Module.ModuleData::getLimit",
            [
                $limit,$curr
            ]
        )->getResult();
        //获得一共多少条
        $count = psf()->call(
            "Module.ModuleData::getCount"
        )->getResult();
        $data = [
            'list'=>$list,
            'count'=>$count
        ];
        return $data;
    }


    /**
     * 编辑时候获得本条数据信息
     * @param $response
     * @param $request
     * @return array
     * @author liuqiaomu
     */
    public function editFindModule( $response, $request)
    {
        $id  = $request->query()['id'];  //当前页
        //获得一条模块数据
         return psf()->call(
            "Module.ModuleData::editFind",
            [
                $id
            ]
        )->getResult();
    }

    /**
     * 编辑模块信息
     * @param $request
     * @return $bool
     * @author liuqiaomu
     */
    public function editModule($response, $request)
    {
        $id = $request->query()['id']; //获得id
        $data = $request->query()['data']; //获得提交修改的信息
        $data = [
            'intro'  => $data['describe'],      //模块简介
            'author' => $data['author'],        //模块作者
            'version'=> $data['version'],       //模块版本
            'identifier' => $data['moduleTag'],//模块标签
            'status' => $data['status'],        //模块标签
        ];
        //编辑模块数据库数据
        $bool = psf()->call(
            "Module.ModuleData::editModule",
            [
                $id, $data
            ]
        )->getResult();
        return $bool;
    }


    /**
     * 删除模块
     * @param $request
     * @return $bool
     * @author liuqiaomu
     */
    public function deleteModule($response, $request)
    {
        $id = $request->query()['id']; //获得id
        $where = [
            'id' => $id
        ];
        $columns = [
            'name'
        ];
        //事务开始
        DB::beginTransaction();
        $data = psf()->call(
            "Module.ModuleData::find",
            [
                $where, $columns
            ]
        )->getResult();

        //伪删除模块数据库数据
        $bool = psf()->call(
            "Module.ModuleData::deleteModule",
            [
                $id
            ]
        )->getResult();
        DB::commit();
        return $bool;
    }

    /**
     * 获得模块配置文件数组
     * @param Response $response
     * @param Request $request
     */
    public function getModuleConfig(Response $response,Request $request)
    {
        return config('module');
    }

}