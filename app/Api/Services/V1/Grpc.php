<?php
/**
 * Created by PhpStorm.
 * User: lixiang
 * Date: 2017/2/27
 * Time: 下午2:45
 */
namespace App\Api\Services\V1;

use Bar\BarCoreClient;

class Grpc
{

    private static $instance;

    public static function getInstance()
    {
        if (!(self::$instance instanceof self)) {
            self::$instance = new BarCoreClient(env('CORE_API_RPC_ADDRESS'),
                ['credentials' => \Grpc\ChannelCredentials::createInsecure()]);
        }
        return self::$instance;
    }

    public function __clone()
    {
        // TODO: Implement __clone() method.
        trigger_error('Clone is not allowed');
    }

}