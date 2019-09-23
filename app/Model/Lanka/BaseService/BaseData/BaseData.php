<?php
/**
 * Data 基类
 * @author liuqiaomu
 */
namespace App\Model\Lanka\BaseService\BaseData;

class BaseData
{

    /**
     * 格式化输出
     *
     * @param string $method
     * @param $args
     * @return array
     */
    public function __call(string $method, $args): array
    {

        $code = 0;
        $msg = 'ok';
        $data = '';
        try {
            if (! method_exists($this, $method)) {
                throw new \Exception($method . '方法找不到', '404');
            }
            $data = call_user_func_array(array(
                $this,
                $method
            ), $args);
        } catch (\Throwable $e) {
            $code = $e->getCode() == 0 ? 9001 : $e->getCode();;
            $msg = $e->getMessage();
        }
        return [
            'code' => $code,
            'msg' => $msg,
            'data' => $data
        ];
    }
}