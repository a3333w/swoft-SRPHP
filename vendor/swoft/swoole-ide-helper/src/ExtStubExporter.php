<?php declare(strict_types=1);

namespace IDEHelper;

use Reflection;
use ReflectionClass;
use ReflectionException;
use ReflectionExtension;
use ReflectionFunction;
use ReflectionMethod;
use ReflectionParameter;
use ReflectionProperty;
use RuntimeException;
use function strpos;
use Swoole\Coroutine;
use Swoole\Coroutine\Channel;
use Swoole\Process;
use Throwable;

/**
 * Class ExtDocsGenerator
 *
 * ExtensionDocument, ExtDocsGenerator
 * ExtDocDumper, ExtDocExporter
 * ExtStubExporter
 *
 * @noinspection AutoloadingIssuesInspection
 */
class ExtStubExporter
{
    public const METHOD   = 1;
    public const PROPERTY = 2;
    public const CONSTANT = 3;

    public const SPACE4 = '    ';
    public const SPACE5 = '     ';

    public const FUNC_PREFIX  = 'Func:';
    public const PHP_KEYWORDS = [
        // 'exit',
        'die',
        'echo',
        'class',
        'interface',
        'function',
        'public',
        'protected',
        'private',
    ];

    /**
     * @var string
     */
    public $lang = 'zh-CN';

    /**
     * @var string
     */
    public $outDir;

    /**
     * @var string
     */
    private $version;

    /**
     * @var string
     */
    private $extName;

    /**
     * @var ReflectionExtension
     */
    private $rftExt;

    /**
     * [
     *  'Server:send' => [
     *      'desc' => '',
     *      'var0' => 'int Description',
     *      'var1' => 'string Description',
     *  ],
     * ]
     *
     * @var array
     */
    private $config = [];

    /**
     * @var array
     */
    private $stats = [
        'class'    => 0,
        'method'   => 0,
        'function' => 0,
        'constant' => 0,
    ];

    /**
     * @var array Short alias class.
     */
    private $shortAliases = [];

    /**
     * @param string $word
     *
     * @return bool
     */
    public static function isPHPKeyword(string $word): bool
    {
        return in_array($word, self::PHP_KEYWORDS, true);
    }

    /**
     * @param string $lang
     *
     * @return self
     */
    public static function create(string $lang = 'en'): self
    {
        return new static($lang);
    }

    /**
     * Class constructor
     *
     * @param string $lang
     */
    public function __construct(string $lang = 'en')
    {
        $this->lang    = $lang ?: 'en';
        $this->extName = 'swoole';
    }

    /**
     * @param string $outDir
     */
    public function export(string $outDir = ''): void
    {
        $this->println('Generate IDE Helper Classes For Swoole Extension');

        try {
            $this->prepare();
            $this->doExport($outDir);

            $this->config = [];
            $this->rftExt = null;

            $this->println("\nStats Information:\n" . json_encode($this->stats, JSON_PRETTY_PRINT));
            $this->println('Export Successful :)');
        } catch (Throwable $e) {
            $this->println("\nExport Failure!\nException:", $e->getMessage());
        }
    }

    /**
     * @throws ReflectionException
     */
    private function prepare(): void
    {
        if (!extension_loaded($this->extName)) {
            throw new RuntimeException("no '{$this->extName}' extension.");
        }

        $this->rftExt  = new ReflectionExtension($this->extName);
        $this->version = $this->rftExt->getVersion();

        $this->println('> Swoole Version: v' . $this->version . "\n");

        // load config data
        $confFile = dirname(__DIR__) . "/config/{$this->lang}.meta.php";
        if (file_exists($confFile)) {
            /** @noinspection PhpIncludeInspection */
            $this->config = require $confFile;
            $this->println(" - Load config data(lang:{$this->lang})");
        }
    }

    /**
     * @param string $outDir
     */
    public function doExport(string $outDir = ''): void
    {
        $this->outDir = $outDir = $outDir ?: dirname(__DIR__) . '/output';
        if (file_exists($outDir)) {
            $this->println(' - Clear old files ...');
            exec("rm -rf {$outDir}");
        }

        // create output directory
        $this->createDir($outDir);
        $this->println(' - Parse and export constants');

        // Get all the global constants
        $defines = $this->getGlobalConstants();
        $this->writePhpFile($outDir . '/constants.php', $defines);
        $this->println(' - Parse and export functions');

        // Get all functions defines
        $funcCodes = $this->getFunctionsDef();
        $this->writePhpFile($outDir . '/functions.php', $funcCodes);

        // Get all classes defines
        $this->println(' - Parse and export classes');
        $classes  = '';
        $aliasTpl = "\nclass %s extends %s{}\n";

        /**
         * @var string          $className
         * @var ReflectionClass $ref
         */
        foreach ($this->rftExt->getClasses() + SwooleLibrary::loadLibClass() as $className => $ref) {
            // 短命名别名
            if (stripos($className, 'co\\') === 0) {
                $this->exportShortAlias($className);
                // 标准命名空间的类名，如 Swoole\Server
            } elseif (false !== strpos($className, '\\')) {
                $this->exportNamespaceClass($className, $ref);
                // 下划线分割类别名
            } else {
                $classes .= sprintf($aliasTpl, $className, self::getNamespaceAlias($className));
            }
        }

        $this->writePhpFile($outDir . '/classes.php', $classes);

        $shortAliases  = '';
        $shortClassTpl = "namespace %s\n{\n%s\n}\n\n";
        foreach ($this->shortAliases as $np => $aliases) {
            $shortAliases .= sprintf($shortClassTpl, $np, implode("\n", $aliases));
        }

        $this->writePhpFile($outDir . '/aliases.php', $shortAliases);
    }

    /**
     * @param string $className
     */
    public function exportShortAlias(string $className): void
    {
        $ns = explode('\\', $className);
        foreach ($ns as $k => $n) {
            $ns[$k] = ucfirst($n);
        }

        $namespace   = implode('\\', array_slice($ns, 0, count($ns) - 1));
        $parentClass = str_replace('Co\\', 'Swoole\\Coroutine\\', ucwords($className, "\\"));

        // $classTpl = "namespace %s \n{\n" . self::SPACE5 . "class %s extends \%s {}\n}\n";
        $classTpl = self::SPACE4 . "class %s extends \%s{}";
        $content  = sprintf($classTpl, end($ns), $parentClass);

        $this->shortAliases[$namespace][] = $content;
    }

    public static function getNamespaceAlias(string $className)
    {
        $lowerName = strtolower($className);
        if ($lowerName === 'co') {
            return Coroutine::class;
        }

        if ($lowerName === 'chan') {
            return Channel::class;
        }

        if ($lowerName === 'swoole_websocket_closeframe') {
            return 'Swoole\\Websocket\\CloseFrame';
        }

        return str_replace('_', '\\', ucwords($className, '_'));
    }

    /***************************************************************************
     * Parse Global Constants Definition
     **************************************************************************/

    /**
     * @return string
     */
    private function getGlobalConstants(): string
    {
        $defines = '';
        foreach ($this->rftExt->getConstants() as $name => $value) {
            if (!is_numeric($value)) {
                $value = "'$value'";
            }

            $this->stats['constant']++;
            $defines .= "define('$name', $value);\n";
        }

        return $defines;
    }

    /***************************************************************************
     * Parse Functions Definition
     **************************************************************************/

    /**
     * @return string
     */
    public function getFunctionsDef(): string
    {
        $all = [];

        /** @var $v ReflectionFunction */
        foreach ($this->rftExt->getFunctions() + SwooleLibrary::loadLibFun() as $function) {
            $this->stats['function']++;

            $inNamespace = $function->inNamespace();
            $name = $inNamespace ? $function->getShortName() : $function->getName();
            $fnArgs  = [];
            $comment = "/**\n";
            $comment .= $this->getDescription($name, true);
            if ($params = $function->getParameters()) {
                foreach ($params as $k1 => $p) {
                    $pName = $p->name;
                    $pType = $this->getParameterType($p, $pName, self::FUNC_PREFIX . $name);

                    $comment .= sprintf(' * @param %s$%s', $pType, $pName) . "\n";
                    $canType = $pType && $pType !== 'mixed ';

                    if ($p->isVariadic()) {
                        $fnArgs[] = sprintf('%s$%s', $canType ? $pType : '', $pName);
                    } elseif ($p->isOptional()) {
                        $fnArgs[] = sprintf('%s$%s = null', $canType ? $pType : '', $pName);
                    } else {
                        $fnArgs[] = ($canType ? $pType : '') . '$' . $pName;
                    }
                }
            }

            $comment .= $this->getReturnLine($name, true);
            $comment .= " */\n";
            $comment .= sprintf("function %s(%s){}\n\n", $name, implode(', ', $fnArgs));

            if ($inNamespace) {
                $ns = $function->getNamespaceName();
                $all[$ns] = ($all[$ns] ?? '') . $comment;
            } else {
                $all['_'] = ($all['_'] ?? '') . $comment;
            }

        }

        $code = '';
        foreach ($all as $ns => $funcCode) {
            if ('_' === $ns) {
                continue;
            }
            $funcCode = preg_replace('/\n/m', "\n" . self::SPACE4, $funcCode);
            $code .= "namespace {$ns} {\n\n    {$funcCode}\n}\n\n";
        }

        if (isset($all['_'])) {
            $code .= $all['_'];
        }

        return $code;
    }

    /***************************************************************************
     * Parse Class
     * - Property Definition
     **************************************************************************/

    /**
     * @param string $classname
     * @param array  $props
     *
     * @return string
     */
    public function getPropertyDef(string $classname, array $props): string
    {
        if (!$props) {
            return '';
        }

        $propString = self::SPACE4 . "// property of the class $classname\n";

        /** @var $prop ReflectionProperty */
        foreach ($props as $k => $prop) {
            $modifiers  = implode(' ', Reflection::getModifierNames($prop->getModifiers()));
            $propString .= self::SPACE4 . "{$modifiers} $" . $prop->name . ";\n";
        }

        return $propString;
    }

    /***************************************************************************
     * Parse Class
     * - Constant Definition
     **************************************************************************/

    /**
     * @param string $classname
     * @param array  $consts
     *
     * @return string
     */
    public function getConstantsDef(string $classname, array $consts): string
    {
        if (!$consts) {
            return '';
        }

        $all = self::SPACE4 . "// constants of the class $classname\n";
        $sp4 = self::SPACE4;

        foreach ($consts as $k => $v) {
            $all .= "{$sp4}public const {$k} = ";
            $v = var_export($v, true);
            $all .= "{$v};\n";
        }

        return $all;
    }

    /***************************************************************************
     * Parse Class
     * - Method Definition
     **************************************************************************/

    /**
     * @param string $classname
     * @param array  $methods
     *
     * @return string
     */
    public function getMethodsDef(string $classname, array $methods): string
    {
        // var_dump("getMethodsDef: " . $classname);
        $all = [];
        $sp4 = self::SPACE4;
        $tpl = "$sp4%s function %s(%s)";

        /**
         * @var string           $k The method name
         * @var ReflectionMethod $m
         */
        foreach ($methods as $k => $m) {
            if ($m->isFinal() || $m->isDestructor()) {
                continue;
            }

            $this->stats['method']++;
            $methodName = $m->name;
            $methodKey  = "{$classname}:$methodName";
            if (self::isPHPKeyword($methodName)) {
                $methodName = '_' . $methodName;
            }

            $arguments = [];

            $comment = "$sp4/**\n";
            $comment .= $this->getDescription($methodKey);

            if ($params = $m->getParameters()) {
                foreach ($params as $k1 => $p) {
                    $pName = $p->name;
                    $pType = $this->getParameterType($p, $pName, $methodKey);

                    $comment .= sprintf('%s * @param %s$%s', $sp4, $pType, $pName) . "\n";
                    $canType = $pType && $pType !== 'mixed ';

                    if ($p->isVariadic()) {
                        $arguments[] = sprintf('%s$%s', ($canType ? $pType : ''), $pName);
                    } elseif ($p->isOptional()) {
                        // var_dump('--------' . $methodName . ':' . $pName);
                        // if ($p->isDefaultValueAvailable()) {
                        //     var_dump($p->getDefaultValue());
                        // }
                        $arguments[] = sprintf('%s$%s = null', ($canType ? $pType : ''), $pName);
                    } else {
                        $arguments[] = ($canType ? $pType : '') . '$' . $pName;
                    }
                }
            }

            if (!empty($config['return'])) {
                $comment .= self::SPACE5 . "* @return {$config['return']}\n";
            } else {
                $comment .= $this->getReturnLine($methodKey);
            }

            $comment   .= "$sp4 */\n";
            $modifiers = implode(' ', Reflection::getModifierNames($m->getModifiers()));
            $comment   .= sprintf($tpl, $modifiers, $methodName, implode(', ', $arguments));
            $comment   .= $m->isAbstract() ? ';' : '{}';

            $all[] = $comment;
        }

        return implode("\n\n", $all);
    }

    /**
     * @param string          $classname
     * @param ReflectionClass $ref
     */
    public function exportNamespaceClass(string $classname, $ref): void
    {
        $arr = explode('\\', $classname);
        if (strtolower($arr[0]) !== $this->extName) {
            return;
        }

        array_walk($arr, function (&$v) {
            $v = ucfirst($v);
        });

        $path = $this->outDir . '/namespace/' . implode('/', array_slice($arr, 1));

        // namespace
        $ns   = implode('\\', array_slice($arr, 0, -1));
        $dir  = dirname($path);
        $name = basename($path);

        // var_dump($classname . '-'. $name);
        $this->stats['class']++;
        // create dir
        $this->createDir($dir);
        // var_dump($classname);

        $content = "namespace {$ns};\n\n" . $this->getClassDef($name, $ref);
        $this->writePhpFile($path . '.php', $content);
    }

    /**
     * @param string          $classname
     * @param ReflectionClass $rftClass
     *
     * @return string
     */
    public function getClassDef(string $classname, $rftClass): string
    {
        // 获取属性定义
        $propString = $this->getPropertyDef($classname, $rftClass->getProperties(
            ReflectionProperty::IS_PUBLIC |
            ReflectionProperty::IS_PROTECTED |
            ReflectionProperty::IS_STATIC
        ));

        // 获取常量定义
        $constString = $this->getConstantsDef($classname, $rftClass->getConstants());

        // 获取方法定义
        $methodString = $this->getMethodsDef($classname, $rftClass->getMethods(
            ReflectionMethod::IS_PUBLIC |
            ReflectionMethod::IS_PROTECTED |
            ReflectionMethod::IS_STATIC |
            ReflectionMethod::IS_ABSTRACT |
            ReflectionMethod::IS_FINAL
        ));

        // build class line
        $classLine = $classname;

        // parent class
        if ($pClass = $rftClass->getParentClass()) {
            $classLine .= ' extends \\' . $pClass->name;
        }

        // interface classes
        if ($faceNames = $rftClass->getInterfaceNames()) {
            $ignoreInterfaces = [];
            foreach ($faceNames as $faceName) {
                try {
                    $ifRef = new ReflectionClass($faceName);
                } catch (ReflectionException $e) {
                    continue;
                }

                foreach ($faceNames as $subi => $subFaceName) {
                    if ($ifRef->isSubclassOf($subFaceName)) {
                        $ignoreInterfaces[] = $subFaceName;
                    }
                }
            }

            $faceNames = array_filter($faceNames, function ($name) use ($ignoreInterfaces) {
                return !in_array($name, $ignoreInterfaces, true);
            });

            $classLine .= ' implements \\' . implode(', \\', $faceNames);
        }

        $version  = $this->version;
        $modifier = 'class';
        if ($rftClass->isInterface()) {
            $modifier = 'interface';
        } elseif ($rftClass->isAbstract()) {
            $modifier = 'abstract class';
        }

        $classBody = <<<PHP
/**
 * @since $version
 */
$modifier $classLine
{
$constString
$propString
$methodString
}
PHP;
        return $classBody;
    }

    /***************************************************************************
     * Build function,method's comments
     * - description
     * - params
     * - return
     **************************************************************************/

    /**
     * @param ReflectionParameter $p
     * @param string              $name
     * @param string              $mthKey method key
     *
     * @return string
     */
    private function getParameterType(ReflectionParameter $p, string $name, string $mthKey = ''): string
    {
        if ($p->isVariadic()) {
            return '...';
        }
        // has type
        if ($pt = $p->getType()) {
            $name = $pt->getName();
            if ($name === 'swoole_process') {
                $name = Process::class;
            }

            // is class
            if (strpos($name, '\\') > 0) {
                $name = '\\' . $name;
            }

            return $name . ' ';
        }

        if ($mthKey && isset(TypeMeta::$special[$mthKey][$name])) {
            return TypeMeta::$special[$mthKey][$name] . ' ';
        }

        if (in_array($name, TypeMeta::INT, true)) {
            return 'int ';
        }

        if (in_array($name, TypeMeta::STRING, true)) {
            return 'string ';
        }

        if (in_array($name, TypeMeta::FLOAT, true)) {
            return 'float ';
        }

        if (in_array($name, TypeMeta::BOOL, true)) {
            return 'bool ';
        }

        if (in_array($name, TypeMeta::ARRAY, true)) {
            return 'array ';
        }

        if (in_array($name, TypeMeta::MIXED, true)) {
            return 'mixed ';
        }

        return '';
    }

    /**
     * @param string $key
     * @param bool   $isFunc
     *
     * @return string
     */
    private function getDescription(string $key, bool $isFunc = false): string
    {
        $desc = '';
        if ($isFunc) {
            $key = self::FUNC_PREFIX . $key;
        }

        if (isset($this->config[$key]['_desc'])) {
            $str  = $this->config[$key]['_desc'];
            $desc = self::formatComment(ucfirst($str), $isFunc);
        }

        return $desc;
    }

    /**
     * Get return comment line
     *
     * @param string $pathKey
     * @param bool   $isFunc
     *
     * @return string
     */
    private function getReturnLine(string $pathKey, bool $isFunc = false): string
    {
        $indent = self::SPACE5;
        if ($isFunc) {
            $indent  = ' ';
            $pathKey = self::FUNC_PREFIX . $pathKey;
        }

        if (isset($this->config[$pathKey]['_return'])) {
            $returnText = trim($this->config[$pathKey]['_return']);
        } else {
            $returnText = TypeMeta::$returnTypes[$pathKey] ?? 'mixed';
        }

        // class name
        // if (strpos($returnText, '\\') > 0) {
        //     $returnText = '\\' . $returnText;
        // }

        return "{$indent}* @return {$returnText}\n";
    }

    /**
     * @param string $comment
     * @param bool   $isFunc
     *
     * @return string
     */
    public static function formatComment(string $comment, bool $isFunc = false): string
    {
        if (!$comment = trim($comment)) {
            return '';
        }

        $indent = $isFunc ? ' ' : self::SPACE5;
        $lines  = explode("\n", $comment);

        foreach ($lines as &$li) {
            // $li = $indent . '* '. ltrim($li, '*');
            $li = $indent . '* ' . ltrim($li);
        }

        return implode("\n", $lines) . "\n";
    }

    /**
     * @param string $comment
     * @param bool   $isFunc
     *
     * @return string
     */
    public static function formatArgComment(string $comment, bool $isFunc = false): string
    {
        if (!$comment = trim($comment)) {
            return '';
        }

        // TODO ...
        return $comment;
    }

    /***************************************************************************
     * Helper methods
     **************************************************************************/

    /**
     * 支持层级目录的创建
     *
     * @param string     $path
     * @param int|string $mode
     * @param bool       $recursive
     *
     * @return bool
     */
    public function createDir(string $path, int $mode = 0775, bool $recursive = true): bool
    {
        return (is_dir($path) || !(!@mkdir($path, $mode, $recursive) && !is_dir($path))) && is_writable($path);
    }

    /**
     * @param string $filepath
     * @param string $content
     */
    private function writePhpFile(string $filepath, string $content): void
    {
        $phpText = <<<PHP
<?php /** @noinspection ALL - For disable PhpStorm check */

$content
PHP;

        file_put_contents($filepath, $phpText);
    }

    /**
     * @param mixed ...$args The args allow int, string
     */
    private function println(...$args): void
    {
        echo implode(' ', $args), "\n";
    }

    /**
     * @return array
     */
    public function getStats(): array
    {
        return $this->stats;
    }

    /**
     * @return string
     */
    public function getExtName(): string
    {
        return $this->extName;
    }
}
