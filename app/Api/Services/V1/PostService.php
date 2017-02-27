<?php
/**
 * Created by PhpStorm.
 * User: lixiang
 * Date: 2017/2/24
 * Time: 上午10:46
 */
namespace App\Api\Services\V1;

use App\Api\Services\V1\Grpc;
use Bar\AddPostReq;

class PostService
{

    /**
     * 发表帖子
     * @param $tid
     * @param $uid
     * @param $title
     * @param $content
     * @throws
     * @return integer
     */
    public function create($tid, $uid, $title, $content){
        $tid = (int) $tid;
        $uid = (int) $uid;
        if (empty($tid) || empty($uid) || empty($title) || empty($content)) {
            return 0;
        }

        //调用RPC服务发表帖子
        $client = Grpc::getInstance();
        $rpc = new AddPostReq();
        $rpc->setTid($tid);
        $rpc->setUid($uid);
        $rpc->setTid($title);
        $rpc->setContent($content);
        list($resp, $status) = $client->AddPost($rpc)->wait();
        if (!empty($resp) && $resp->getStatus() == 0) {//注意这里请求不到go，resp为null，0这个状态码是在go里面自己定义的
            $insertId =  $resp->getQid();
        } else {
            throw new \Exception('请求RPC失败');
        }

        return $insertId;
    }
}