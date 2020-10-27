<?php declare(strict_types=1);


namespace Swoft\Devtool\Command;

use Swoft\Bean\Annotation\Mapping\Inject;
use Swoft\Console\Annotation\Mapping\Command;
use Swoft\Console\Annotation\Mapping\CommandArgument;
use Swoft\Console\Annotation\Mapping\CommandMapping;
use Swoft\Console\Annotation\Mapping\CommandOption;
use Swoft\Devtool\Model\Logic\MigrateLogic;
use Leuffen\TextTemplate\TemplateParsingException;
use ReflectionException;
use Swoft\Bean\Exception\ContainerException;

/**
 * Class MigrateCommand
 *
 * @since 2.0
 *
 * @Command(name="migrate")
 *
 * @CommandOption(name="prefix", desc="database prefix", default="", type="string")
 * @CommandOption(name="start", desc="start index for database prefix and prefix is not empty", default="0", type="int")
 * @CommandOption(name="end", desc="end index for database prefix and prefix is not empty", default="0",  type="int")
 * @CommandOption(name="db", desc="databases for migrate, many is separated by ','", default="", type="string")
 */
class MigrateCommand
{
    /**
     * @Inject()
     *
     * @var MigrateLogic
     */
    private $logic;

    /**
     * Creates a new migration.
     *
     * @CommandMapping()
     * @CommandArgument(name="name", desc="the name of the new migration", type="string", mode=Command::OPT_REQUIRED)
     * @throws ContainerException
     * @throws ReflectionException
     * @throws TemplateParsingException
     */
    public function create(): void
    {
        $name = input()->get('name');
        $this->logic->create($name);
    }

    /**
     * Upgrades the application by applying new migrations.
     *
     * @CommandMapping()
     */
    public function up(): void
    {
        $db     = input()->getArg('db', '');
        $prefix = input()->getArg('prefix', '');
        $start  = input()->getArg('start', 0);
        $end    = input()->getArg('end', 0);

        $dbs = explode(',', $db);

        $this->logic->up($dbs, $prefix, $start, $end);
    }

    /**
     * Downgrades the application by reverting old migrations.
     *
     * @CommandMapping()
     */
    public function down(): void
    {

    }

    /**
     * Displays the migration history.
     *
     * @CommandMapping()
     * @CommandArgument(name="limit", desc=" the maximum number of migrations to be displayed.", type="int")
     */
    public function history(): void
    {

    }

    /**
     * Upgrades the specified
     *
     * @CommandMapping()
     * @CommandArgument(name="name", desc="the name is to upgrades, many is separated by ','.", type="string")
     */
    public function to(): void
    {

    }
}
