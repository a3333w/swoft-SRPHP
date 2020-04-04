<?php declare(strict_types=1);

namespace App\Model\Logic\System\V1\Log;

use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Db\DB;
use Swoft\Http\Message\Request;
use Swoft\Http\Message\Response;
use Swoft\Http\Server\HttpServer;

/**
 * Class LogLogicClass
 * @since 2.0
 * @Bean(name="log", scope=Bean::PROTOTYPE)
 */
class LogLogic
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
     * 获得列表
     * @param $response
     * @param $request
     * @return array
     * @author liuqiaomu
     */
    public function getList( $response, $request)
    {
        $limit = $request->query()['limit']; //分页数
        $curr  = $request->query()['curr'];  //当前页

        //获得日志列表
        $list = psf()->call(
            "Log.LogData::getLimit",
            [
                $limit,$curr
            ]
        )->getResult();
        //获得一共多少条
        $count = psf()->call(
            "Log.LogData::getCount"
        )->getResult();
        $data = [
            'list'=>$list,
            'count'=>$count
        ];
        return $data;
    }


}