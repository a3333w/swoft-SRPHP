<?php
namespace app\External;

use App\Utils\Code;
use App\Utils\Message;
use GuzzleHttp\Client;

abstract class ApiMap
{
    private static $client = null;
    private static $obj = [];

    public static function getInstance() {
        if(!isset(self::$obj[static::class])){
            self::$obj[static::class] = new static();
            self::$client = new Client();
        }

        return self::$obj[static::class];
    }

    abstract public function returnMap():array;

    abstract public function getApiMap(string $map):string;

    public function post(string $map,array $fields) {
        $response = self::$client->post(self::getInstance()->getApiMap($map),['form_params'=>$fields]);
        $data = json_decode($response->getBody()->getContents(),true);
        return $data['status'] == 101
            ? Message::returnMsg($data['data'])
            : Message::returnMsg(false,$data['msg'],Code::PARAM_ERROR);
    }
}