<?php declare(strict_types=1);

namespace App\Http\Middleware;

use App\Utils\Message;
use App\Utils\Validate\IpCheck;
use Co\Context;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Bean\Annotation\Mapping\Inject;
use Swoft\Http\Server\Contract\MiddlewareInterface;
/**
 * @Bean(name="VerifyMiddleware",scope=Bean::SINGLETON)
 */
class VerifyMiddleware implements MiddlewareInterface
{
    /**
     * @Inject()
     * @var IpCheck
     */
    private $ipCheck;

    /**
     * Process an incoming server request.
     *
     * @param ServerRequestInterface $request
     * @param RequestHandlerInterface $handler
     *
     * @return ResponseInterface
     * @inheritdoc
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        //验证签名
        $result = $this->checkSign($request);
        $response = $handler->handle($request);
        if ($result['code'] != 1000) {
            $response = $response->withdata($result);
        }
        return $this->configResponse($response);
    }

    private function configResponse(ResponseInterface $response)
    {
        return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    }

    public function checkSign(ServerRequestInterface $request) :array
    {
        $params = $request->getQueryParams();

        //内网ip无需验证
        $remote_addr = $request->getServerParams()["remote_addr"];

        if (!isset($params['app_key'])) {
            return Message::returnMsg(true);

            return $this->ipCheck->checking(config('IP_RANGE'),$remote_addr);
        } else {
            if (!array_key_exists($params['app_key'],config('api'))) return Message::error("错误的app_key！",2001);

            $config = config('api')[$params['app_key']];
            if (($result = $this->ipCheck->checking($config['ip_range'],$remote_addr))['code'] != 1000) {
                return $result;
            }

            if ($params["timestamp"] < time()-60) {
                return Message::error("签名已过期",2004);
            }

            //生成key
            $sign = $params['sign'];
            $postParam = $request->getParsedBody();

            unset($params['sign']);  // 生成 sign的时候 把sign 参数去掉
            $str = '';
            ksort($params); // 排序
            foreach($params as $key=>$val) {
                if ( $key == "sign" || $key == "secret_key") {
                    continue;
                } else {
                    $str .= '&' . $key . '=' . $val;
                }
            }

            $str = trim($str,'&');

            return Message::returnMsg($sign == (md5($str.$config['app_secret'].json_encode($postParam))),"签名错误！",2000);
        }
    }
}