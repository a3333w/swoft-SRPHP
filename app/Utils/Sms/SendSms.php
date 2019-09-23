<?php
namespace App\Utils\Sms;

use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;
use App\Utils\Code;
use App\Utils\Message;
use Co\Redis;
use Swoft\Bean\Annotation\Mapping\Bean;

/**
 * Class SendSms
 * @package App\Utils\Sms
 *
 * @Bean()
 */
class SendSms
{
    /**
     * @param array $data
     * $param mobile 手机号
     * $param code   验证码
     */
    public static function send(array $data)
    {
        AlibabaCloud::accessKeyClient(config('sms')['key'], config('sms')['secret'])
            ->regionId('cn-hangzhou') // replace regionId as you need
            ->asDefaultClient();

        try {
            $code = rand(100000,999999);

            $result = AlibabaCloud::rpc()
                ->product('Dysmsapi')
                // ->scheme('https') // https | http
                ->version('2017-05-25')
                ->action('SendSms')
                ->method('POST')
                ->options([
                    'query' => [
                        'RegionId' => "cn-hangzhou",
                        'PhoneNumbers' => $data['mobile'],
                        'SignName' => "礼品兑换中心",
                        'TemplateCode' => "SMS_104375023",
                        'TemplateParam' => '{"yzm":'.$code.'}',
                    ],
                ])
                ->request();

            if($result->toArray()['Message'] == 'OK') {
                \Swoft\Redis\Redis::set("{$data['mobile']}",$code,900);
                return Message::returnMsg(true);
            }else{
                return Message::returnMsg(false,json_encode($result->toArray()),Code::SEND_SMS_ERROR);
            }
        } catch (ClientException $e) {
            return Message::returnMsg(false,$e->getErrorMessage(),Code::SEND_SMS_ERROR);
        } catch (ServerException $e) {
            return Message::returnMsg(false,$e->getErrorMessage(),Code::SEND_SMS_ERROR);
        }
    }
}
