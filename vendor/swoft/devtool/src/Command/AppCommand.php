<?php declare(strict_types=1);

namespace Swoft\Devtool\Command;

use InvalidArgumentException;
use RuntimeException;
use Swoft;
use Swoft\Bean\BeanFactory;
use Swoft\Console\Annotation\Mapping\Command;
use Swoft\Console\Annotation\Mapping\CommandMapping;
use Swoft\Console\Annotation\Mapping\CommandOption;
use Swoft\Console\Helper\Show;
use Swoft\Console\Output\Output;
use Swoft\Stdlib\Helper\DirHelper;
use Swoft\Stdlib\Helper\Sys;
use Swoole\Coroutine;
use function array_merge;
use function class_exists;
use function extension_loaded;
use function implode;
use function input;
use function is_int;
use function output;
use function sprintf;
use function str_pad;
use function strpos;
use function version_compare;
use const PHP_VERSION;
use const PHP_VERSION_ID;
use const SWOOLE_VERSION;

/**
 * There are some help command for application[by <cyan>devtool</cyan>]
 *
 * @Command(coroutine=false)
 */
class AppCommand
{
    /**
     * init the project, will create runtime dirs
     *
     * @CommandMapping("init", usage="{fullCommand} [arguments] [options]")
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public function initApp(): void
    {
        $tmpDir = Swoft::getAlias('@runtime');
        $names  = [
            'logs',
            'uploadfiles'
        ];

        output()->writeln('Create runtime directories: ' . implode(',', $names));

        foreach ($names as $name) {
            DirHelper::make($tmpDir . '/' . $name);
        }

        output()->writeln('<success>OK</success>');
    }

    /**
     * @CommandMapping()
     * @CommandOption("type", desc="Display the bean names of the type")
     */
    public function bean(): void
    {
        $names = BeanFactory::getContainer()->getNames();
        $type  = input()->getOpt('type');

        if (isset($names[$type])) {
            Show::prettyJSON($names[$type]);

            return;
        }

        Show::prettyJSON($names);
    }

    /**
     * Check current operating environment information
     *
     * @CommandMapping()
     * @param Output $output
     *
     * @throws RuntimeException
     */
    public function check(Output $output): void
    {
        // Env check
        [$code, $return,] = Sys::run('php --ri swoole');
        $asyncRdsEnabled = $code === 0 ? strpos($return, 'async_redis') : false;

        $swoVer = SWOOLE_VERSION;
        $tipMsg = 'Please disabled it, otherwise swoole will be affected!';
        $extOpt = [
            'yes' => 'No',
            'no'  => 'Yes',
        ];

        $list = [
            "<bold>Runtime environment check</bold>\n",
            'PHP version is greater than 7.1?'    => self::wrap(PHP_VERSION_ID > 70100, 'current is ' . PHP_VERSION),
            'Swoole extension is installed?'      => self::wrap(extension_loaded('swoole')),
            'Swoole version is greater than 4.3?' => self::wrap(version_compare($swoVer, '4.3.0', '>='), 'current is ' . $swoVer),
            'Swoole async redis is enabled?'      => self::wrap($asyncRdsEnabled),
            'Swoole coroutine is enabled?'        => self::wrap(class_exists(Coroutine::class, false)),
            "\n<bold>Extensions that conflict with 'swoole'</bold>\n",
            // ' extensions'                             => 'installed',
            ' - zend'                             => self::wrap(!extension_loaded('zend'), $tipMsg, true, $extOpt),
            ' - xdebug'                           => self::wrap(!extension_loaded('xdebug'), $tipMsg, true, $extOpt),
            ' - xhprof'                           => self::wrap(!extension_loaded('xhprof'), $tipMsg, true, $extOpt),
            ' - blackfire'                        => self::wrap(!extension_loaded('blackfire'), $tipMsg, true, $extOpt),
        ];

        $buffer = [];
        $pass   = $total = 0;

        foreach ($list as $question => $value) {
            if (is_int($question)) {
                $buffer[] = $value;
                continue;
            }

            $total++;

            if ($value[0]) {
                $pass++;
            }

            $question = str_pad($question, 45);
            $buffer[] = sprintf('  <comment>%s</comment> %s', $question, $value[1]);
        }

        $buffer[] = "\nCheck total: <bold>$total</bold>, Through the check: <success>$pass</success>";

        $output->writeln($buffer);
    }

    /**
     * @param bool|mixed  $condition
     * @param string|null $msg
     * @param bool        $showOnFalse
     *
     * @param array       $opts
     *
     * @return array
     */
    public static function wrap($condition, string $msg = null, $showOnFalse = false, array $opts = []): array
    {
        $desc = '';
        $opts = array_merge([
            'yes' => 'Yes',
            'no'  => 'No',
        ], $opts);

        $result = $condition ? "<success>{$opts['yes']}</success>" : "<red>{$opts['yes']}</red>";

        if ($msg) {
            if ($showOnFalse) {
                $desc = !$condition ? " ($msg)" : '';
            } else {
                $desc = " ($msg)";
            }
        }

        return [(bool)$condition, $result . $desc];
    }
}
