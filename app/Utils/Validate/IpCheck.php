<?php
namespace App\Utils\Validate;


use App\Utils\Code;
use App\Utils\Message;
use Swoft\Bean\Annotation\Mapping\Bean;

/**
 * 用法：$ipCheck = new ipCheck('192.168.1.1-254');
 *       echo (TRUE === $ipCheck ->check('192.168.1.45')) ? 'PASS' : $ipCheck->msg;
 *       或者：
 *       $ipCheck = new ipCheck('192.0.0.1-192.254.254.254');
 *       echo (FALSE !== $ipCheck ->check('192.168.10.45')) ? 'PASS' : $ipCheck->msg;
 *       或者：
 *       $ipCheck = new ipCheck('192.168.1.1/24');
 *       echo (FALSE !== $ipCheck ->check('192.168.10.45')) ? 'PASS' : $ipCheck->msg;
 *
 * @Bean()
 */
class IpCheck
{
    public $ipRangeStr = '10.0.0.1/8';
    public $msg = '';

    public function __construct(){
    }

    public function checking($rangeIp,$checkIp) {
        $rangeIp = strpos($rangeIp,',') ? array_filter(explode(',',$rangeIp)) : [$rangeIp];
        if(empty($rangeIp)) return Message::returnMsg(false,"非法ip请求".$checkIp,Code::NOT_WHITE_IP_LIST);

        foreach($rangeIp as $key=>$ip) {
            $this->ipRangeStr = $ip;
            $bool = $this->check($checkIp);
            if($bool) return Message::returnMsg(true);
        }

        return Message::returnMsg(false,"非法ip请求",Code::NOT_WHITE_IP_LIST);
    }

    public function check(string $ip) {
        if(empty($ip)) return FALSE;
        # 判断检测类型
        if (FALSE !== strpos($this->ipRangeStr,'-')){
            $type = 'size'; // 简单比大小：10.0.0.1-254 OR 10.0.0.1-10.0.0.254
        }else if(FALSE !== strpos($this->ipRangeStr,'/')){
            $type = 'mask'; // 掩码比大小：10.0.0.1/24
        }else{
            $this->msg = '错误的IP范围值';
            return FALSE;
        }
        //var_dump($type);
        # 分析IP范围
        if ('size' === $type){
            $ipRangeStr = explode('-',$this->ipRangeStr);
            $ipAllowStart = $ipRangeStr[0];
            $ipAllowEnd = $ipRangeStr[1];
            if (FALSE === strpos($ipAllowEnd,'.')){ # 10.0.0.254 OR 254
                $ipAllowElmArray = explode('.',$ipAllowStart);
                $ipAllowEnd = $ipAllowElmArray[0] . '.' .
                    $ipAllowElmArray[1] . '.' .
                    $ipAllowElmArray[2] . '.' .
                    $ipAllowEnd;
            }
        }else if ('mask' === $type){
            $ipRangeStr = explode('/',$this->ipRangeStr);
            $ipRangeIP = $ipRangeStr[0];
            # 获取掩码中最后一位非零数的值
            $ipRangeMask = (int)$ipRangeStr[1];
            $maskElmNumber = floor($ipRangeMask/8); # 保留IP前几段
            $maskElmLastLen = $ipRangeMask % 8; # 255.255.here.0
            $maskElmLast = str_repeat(1,8-$maskElmLastLen);
            $maskElmLast = bindec($maskElmLast); # 掩码中IP末段最大值(十进制)

            // 获取IP段开始、结束值
            $ipRangeIPElmArray = explode('.',$ipRangeIP);
            if (0 == $maskElmNumber){
                $ipAllowStart = '0.0.0.0';
                $ipAllowEnd = $maskElmLast . '.254.254.254';
            }else if (1 == $maskElmNumber){
                $ipAllowStart = $ipRangeIPElmArray[0] . '.' . '0.0.0';
                $ipAllowEnd = $ipRangeIPElmArray[0] . '.' . $maskElmLast . '.254.254';
            }else if (2 == $maskElmNumber){
                $ipAllowStart = $ipRangeIPElmArray[0] . '.' . $ipRangeIPElmArray[1] . '.' . '0.0';
                $ipAllowEnd = $ipRangeIPElmArray[0] . '.' . $ipRangeIPElmArray[1] . '.' . $maskElmLast . '.254';
            }else if (3 == $maskElmNumber){
                $ipAllowStart = $ipRangeIPElmArray[0] . '.' . $ipRangeIPElmArray[1] . '.' . $ipRangeIPElmArray[2] . '.' . '0';
                $ipAllowEnd = $ipRangeIPElmArray[0] . '.' . $ipRangeIPElmArray[1] . '.' . $ipRangeIPElmArray[2] . '.' . $maskElmLast;
            }else if (4 == $maskElmNumber){
                $ipAllowEnd = $ipAllowStart = $ipRangeIP;
            }else{
                $this->msg = '错误的IP段数据';
                return $this->msg;
            }
        }else{
            $this->msg = '错误的IP段类型';
            return $this->msg;
        }
        //echo $ipAllowStart;
        //echo $ipAllowEnd;
        // 检测IP
        $ipAllowStart = $this->getDecIp($ipAllowStart);
        $ipAllowEnd = $this->getDecIp($ipAllowEnd);
        $ip = $this->getDecIp($ip);
        if (!empty($ip)){
            if ($ip <= $ipAllowEnd && $ip >= $ipAllowStart){
                $this->msg = 'IP检测通过';
                return TRUE;
            }else{
                $this->msg = '此为被限制IP';
                return FALSE;
            }
        }else{
            FALSE === ($this->msg) && $this->msg == '没有提供待检测IP'; // getClentIp() 是否返回false
            return $this->msg; // 没有获取到客户端IP，返回
        }
    }

    // 10进制IP
    public function getDecIp($ip){
        $ip = explode(".", $ip);
        return $ip[0]*255*255*255+$ip[1]*255*255+$ip[2]*255+$ip[3];
    }
}
