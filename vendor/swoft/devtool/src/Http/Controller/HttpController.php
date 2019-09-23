<?php declare(strict_types=1);

namespace Swoft\Devtool\Http\Controller;

use Swoft\Http\Message\Request;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Server\Annotation\Mapping\RequestMethod;

/**
 * Class RouteController
 *
 * @Controller("/__devtool/http")
 */
class HttpController
{
    /**
     * @RequestMapping("routes", method=RequestMethod::GET)
     * @param Request $request
     * @return array|string
     * @throws \Throwable
     */
    public function routes(Request $request)
    {
        $asString = (int)$request->query('asString', 0);

        /** @var \Swoft\Http\Server\Router\Router $router */
        $router = \bean('httpRouter');

        if ($asString === 1) {
            return $router->toString();
        }

        return [
            'routes'  => $router->getRoutes()
        ];
    }
}
