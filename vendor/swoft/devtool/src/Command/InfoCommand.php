<?php declare(strict_types=1);

namespace Swoft\Devtool\Command;

use RuntimeException;
use Swoft;
use Swoft\Bean\Exception\ContainerException;
use Swoft\Console\Annotation\Mapping\Command;
use Swoft\Console\Annotation\Mapping\CommandMapping;
use Swoft\Console\Output\Output;
use Swoft\Stdlib\Helper\Sys;
use function alias;
use function array_shift;
use function explode;
use function trim;

/**
 * There are some commands for application dev[by <cyan>devtool</cyan>]
 * @Command(coroutine=false)
 */
class InfoCommand
{
    /**
     * Print current system environment information
     *
     * @CommandMapping()
     *
     * @param Output $output
     *
     * @throws RuntimeException
     * @throws ContainerException
     */
    public function env(Output $output): void
    {
        $info = [
            // "<bold>System environment info</bold>\n",
            'OS'             => PHP_OS,
            'Php version'    => PHP_VERSION,
            'Swoole version' => SWOOLE_VERSION,
            'Swoft version'  => Swoft::VERSION,
            'App Name'       => config('name', 'unknown'),
            'Base Path'      => alias('@base'),
        ];

        $output->aList($info, 'System Environment Info');
    }

    /**
     * display info for the swoole extension
     *
     * @CommandMapping(alias="swo,sw")
     * @param Output $output
     */
    public function swoole(Output $output): void
    {
        [$zero, $ret,] = Sys::run('php --ri swoole');

        // no swoole ext
        if ($zero !== 0) {
            $output->error(trim($ret));
            return;
        }

        $info = $dirt = [];
        $list = explode("\n\n", $ret);

        $information = explode("\n", $list[1]);
        foreach ($information as $line) {
            $info[] = explode(' => ', $line, 2);
            // $info[$k] = $v;
        }

        $directives = explode("\n", trim($list[2]));
        array_shift($directives);

        foreach ($directives as $line) {
            $dirt[] = explode(' => ', $line, 2);
        }

        $output->title('information for the swoole extension');

        $output->table($info, 'basic information', [
            'columns'   => ['name', 'value'],
            'bodyStyle' => 'info'
        ]);

        $output->table($dirt, 'directive config', [
            'columns' => ['Directive', 'Local Value => Master Value']
        ]);
    }
}
