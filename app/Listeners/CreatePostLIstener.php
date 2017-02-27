<?php
/**
 * Created by PhpStorm.
 * User: lixiang
 * Date: 2017/2/24
 * Time: 下午12:02
 */
namespace App\Listeners;

use App\Events\CreatePostEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreatePostListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CreatePostEvent  $event
     * @return void
     */
    public function handle(CreatePostEvent $event)
    {
        //给用户加经验
        $event->addExperience();
        //消息通知
        $event->notification();
        //生成动态
        $event->trend();
    }
}