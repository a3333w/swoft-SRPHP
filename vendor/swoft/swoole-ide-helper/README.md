# swoole-ide-helper

add ide-helper for **swoole**, forked from [swoole/ide-helper](https://github.com/swoole/ide-helper)

## Usage

the [swoft](https://github.com/swoft-cloud/swoft) use it as default.

you can add it by `composer`:

```bash
composer require swoft/swoole-ide-helper
```

`swoft/swoole-ide-helper` keep the same version of **swoole**

## Generate

```bash
php dump.php
```

## Diff With swoole/ide-helper

跟源仓库稍微不同的是：给大部分方法参数添加了变量类型。

eg, old：

```php
public function send($fd, $send_data, $reactor_id=null){}
```

now:

```php
public function send(int $fd, string $send_data, int $reactor_id=null){}
```
