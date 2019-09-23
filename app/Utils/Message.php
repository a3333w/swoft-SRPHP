<?php

namespace App\Utils;

class Message
{
    const CODE_SUCCESS = 1000;
    const CODE_ERROR = 2002;

    public static function success($msg = 'success', $code = '', $data = [])
    {
        return ['code' => $code?:self::CODE_SUCCESS, 'msg' => $msg, 'data' => $data];
    }

    public static function error($msg = 'error', $code = '', $data = [])
    {
        return ['code' => $code?:self::CODE_ERROR, 'msg' => $msg, 'data' => $data];
    }

    public static function returnMsg($result,$msg = '',$code = '') {
        return $result !== false ? self::success('success',self::CODE_SUCCESS,$result) : self::error($msg,$code,[]);
    }
}
