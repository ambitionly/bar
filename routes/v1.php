<?php
/**
 * Created by PhpStorm.
 * User: lixiang
 * Date: 2017/2/24
 * Time: 上午10:19
 */
$api = app('Dingo\Api\Routing\Router');
$api->version('1.0', function ($api) {
    $api->group([
        'namespace'=>'App\Api\Controllers\V1',
        'middleware' => [
//            'permission',
//            'login.verify'
        ]
    ] ,function ($api)
    {
        /** 帖子 **/
        $api->get('/post', 'PostController@index');
        $api->post('/post','PostController@create');
    });
});