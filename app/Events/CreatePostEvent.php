<?php
/**
 * Created by PhpStorm.
 * User: lixiang
 * Date: 2017/2/24
 * Time: 下午12:11
 */
namespace App\Events;

class CreatePostEvent extends Event
{

    private $uid;

    /**
     * CreatePostEvent constructor.
     * @param $uid
     */
    public function __construct($uid)
    {
        $this->uid = $uid;
    }

    public function addExperience()
    {
        var_dump("这是经验");
    }

    /**
     * 这个步骤不是要求很实时，将其先压入队列
     */
    public function notification()
    {
        var_dump("这是通知");
    }

    public function trend()
    {
        var_dump("这是动态");
    }
}
