<?php declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link    https://swoft.org
 * @document https://doc.swoft.org
 * @contact group@swoft.org
 * @license https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace Swoft\Devtool\Http\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Co;
use Swoft\Config\Annotation\Mapping\Config;
use Swoft\Console\Console;
use Swoft\Devtool\DevTool;
use Swoft\Http\Message\Request;
use Swoft\Http\Server\Contract\MiddlewareInterface;

/**
 * Class DevToolMiddleware - Custom middleware
 * @Bean()
 */
class DevToolMiddleware implements MiddlewareInterface
{
    /**
     * @Config("devtool.logHttpRequestToConsole")
     * @var bool
     */
    public $logHttpRequestToConsole = false;

    /**
     * @param \Psr\Http\Message\ServerRequestInterface|Request $request
     * @param \Psr\Http\Server\RequestHandlerInterface         $handler
     *
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Throwable
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        // Before request
        $path = $request->getUri()->getPath();

        if ($this->logHttpRequestToConsole) {
            Console::log(\sprintf('%s %s', $request->getMethod(), $path), [], 'debug', [
                'HttpServer',
                // 'WorkerId' => App::getWorkerId(),
                'CoId' => Co::tid()
            ]);
        }

        // If it is not an ajax request, then render vue index file.
        if (0 === \strpos($path, DevTool::ROUTE_PREFIX) && !$request->isAjax()) {
            $json = $request->query('json');

            if (null === $json) {
                return \view(\alias('@devtool/web/dist/index.html'));
            }
        }

        $response = $handler->handle($request);

        // After request
        return $response->withAddedHeader('Swoft-DevTool-Version', '1.0.0');
    }
}
