<?php
/**
 * Created by PhpStorm.
 * User: lixiang
 * Date: 2017/2/24
 * Time: 上午10:46
 */
namespace App\Api\Services\V1;

class PostService
{

    /**
     * 发表帖子
     * @param $tid
     * @param $uid
     * @param $title
     * @param $content
     * @return bool
     */
    public function create($tid, $uid, $title, $content){
        $tid = (int) $tid;
        $uid = (int) $uid;
        if (empty($tid) || empty($uid) || empty($title) || empty($content)) {
            return false;
        }

        //调用RPC服务发表帖子

        return true;
    }
}