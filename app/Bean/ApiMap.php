<?php declare(strict_types=1);

namespace App\Bean;
use App\Utils\Code;
use GuzzleHttp\Client;
use App\Utils\Message;

use Swoft\Bean\Annotation\Mapping\Bean;

/**
 * Class PrototypeClass
 *
 * @since 2.0
 *
 * @Bean(name="apiMap", scope=Bean::SINGLETON, alias="api")
 */
class ApiMap
{
    private $client;

    public function init() {
        $this->client = new Client();
    }

    public function returnMap() :array {

    }

    public function getMap(string $map) : string {

    }

    public function post(string $map,array $fields) {
        $response = $this->client->post($this->getMap($map),['form_params'=>$fields]);
        $data = json_decode($response->getBody()->getContents(),true);
        return $data['status'] == 101
            ? Message::returnMsg($data['data'])
            : Message::returnMsg(false,$data['msg'],Code::PARAM_ERROR);
    }
}