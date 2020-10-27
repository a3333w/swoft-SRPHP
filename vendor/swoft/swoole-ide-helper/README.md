# Swoole IDE Helper

[![Latest Stable Version](http://img.shields.io/packagist/v/swoft/swoole-ide-helper.svg)](https://packagist.org/packages/swoft/swoole-ide-helper)
[![Packagist](https://img.shields.io/packagist/dt/swoft/swoole-ide-helper)](https://packagist.org/packages/swoft/swoole-ide-helper)
[![License](https://img.shields.io/hexpm/l/plug.svg?maxAge=2592000)](https://github.com/swoft-cloud/swoole-ide-helper/blob/master/LICENSE)

Add IDE helper for the **swoole** extension, forked from [swoole/ide-helper](https://github.com/swoole/ide-helper)

> `swoft/swoole-ide-helper` keep the same version of **swoole**

## Diff With swoole/ide-helper

Different from the source repository: variable types are added to most method parameters for easy reference. 

Old：

```php
/**
 * @param $fd
 * @param $data
 * @param $opcode
 * @param $finish
 * @return mixed
 */
public function push($fd, $data, $opcode = null, $finish = null){}
```

**Now**:

```php
/**
 * @param int $fd
 * @param mixed $data
 * @param int $opcode
 * @param bool $finish
 * @return mixed
 */
public function push(int $fd, $data, int $opcode = null, bool $finish = null){}
```

## Install

The [Swoft](https://github.com/swoft-cloud/swoft) use it as default.

You can add it by `composer`:

```bash
composer require --dev swoft/swoole-ide-helper

# use latest code
composer require --dev swoft/swoole-ide-helper@dev-master

# for specific version
composer require --dev swoft/swoole-ide-helper:~4.4.2
```

## Build

You can regenerate it locally. Of course, you must ensure that the `swoole` extension is already installed.

```bash
php dump.php
```

## LICENSE

See [LICENSE](LICENSE)
