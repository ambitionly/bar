<?php
/**
 * Created by PhpStorm.
 * User: lixiang
 * Date: 2017/2/22
 * Time: 上午10:18
 */
namespace App\Api\Controllers\V1;

use Event;
use App\Events\CreatePostEvent;
use Illuminate\Http\Request;
use App\Api\Services\V1\PostService;

class PostController extends BaseController
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $inputs = $request->only('qid');
        $data = $inputs;
        return $this->success($data);
    }

    /**
     * 发表帖子
     * tid 话题ID，title 标题，content 内容， uid 用户ID(从中间件中获取)
     * @param Request $request
     * @return mixed
     */
    public function create(Request $request)
    {
        $inputs = $request->only('tid', 'title', 'content', 'uid');
        $validator = app('validator')->make($inputs, [
            'tid'       => 'required|integer',
            'uid'       => 'required|integer',
            'title'     => 'required|string',
            'content'   => 'required|string',
        ],['required' => ':attribute 不能为空']);
        $this->inputErrors($validator);

        $postServ = new PostService();
        $r = $postServ->create($inputs['tid'], $inputs['uid'], $inputs['title'], $inputs['content']);
        if ($r) {
            Event::fire(new CreatePostEvent($inputs['uid']));
            return $this->success();
        } else {
            return $this->failed('发表失败');
        }
    }
}