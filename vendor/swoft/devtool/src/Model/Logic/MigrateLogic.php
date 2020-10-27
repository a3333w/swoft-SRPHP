<?php declare(strict_types=1);


namespace Swoft\Devtool\Model\Logic;

use Leuffen\TextTemplate\TemplateParsingException;
use ReflectionException;
use Swoft;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Bean\BeanFactory;
use Swoft\Bean\Exception\ContainerException;
use Swoft\Db\DB;
use Swoft\Db\Migration\Migration;
use Swoft\Devtool\FileGenerator;

/**
 * Class MigrateLogic
 *
 * @since 2.0
 *
 * @Bean()
 */
class MigrateLogic
{
    /**
     * @param string $name
     *
     * @throws ContainerException
     * @throws ReflectionException
     * @throws TemplateParsingException
     */
    public function create(string $name): void
    {
        /* @var Migration $migrate */
        $migrate = BeanFactory::getBean('migration');

        $time = date('YmdHis');
        $name = sprintf('%s%s', $name, $time);

        $tplDir = $migrate->getTemplateDir();
        $config = [
            'tplFilename' => $migrate->getTemplateFile(),
            'tplDir'      => Swoft::getAlias($tplDir),
            'className'   => $name,
        ];

        $file = $migrate->getMigrationPath();
        $file = Swoft::getAlias($file);
        $file = sprintf('%s/%s.php', $file, $name);

        $data = [
            'namespace' => $migrate->getNamespace(),
            'name'      => $name,
            'time'      => (int)$time
        ];

        $gen = new FileGenerator($config);
        $gen->renderas($file, $data);


        $data = [
            'className' => $name,
            'file'      => $file
        ];
        output()->aList($data, 'Migration create success');
    }

    /**
     * @param array  $dbs
     * @param string $prefix
     * @param int    $start
     * @param int    $end
     */
    public function up(array $dbs, string $prefix, int $start = 0, int $end = 0): void
    {
        $this->createMigration('');
    }

    /**
     *
     *
     * @param string $db
     *
     * @return bool
     */
    private function createMigration(string $db): bool
    {
        $sql = <<<sql
CREATE TABLE IF NOT EXISTS `migration` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `version` int(11) DEFAULT NULL,
  `name` varchar(60) NOT NULL DEFAULT '',
  `time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
sql;

        return DB::statement($sql);
    }
}
