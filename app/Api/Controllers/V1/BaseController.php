<?php
/**
 * Created by PhpStorm.
 * User: lixiang
 * Date: 2017/2/22
 * Time: 上午10:22
 */
namespace App\Api\Controllers\V1;

use Dingo\Api\Routing\Helpers;
use Illuminate\Validation\Validator;
use Laravel\Lumen\Routing\Controller;
use Dingo\Api\Exception\StoreResourceFailedException;

/**
 * Class BaseController
 * @package App\Api\V1\Controllers
 */
class BaseController extends Controller
{

    use Helpers;

    /**
     * @param Validator $validator
     */
    protected function inputErrors(Validator $validator)
    {
        if ($validator->fails()) {
            throw new StoreResourceFailedException('参数错误', $validator->errors());
        }
    }

    /**
     * @param $resp
     * @return mixed
     */
    protected function success($resp = [])
    {
        return
            $this->response->array([
                'code'    => 200,
                'message' => 'success',
                'data'    => $resp
            ]);
    }

    protected function failed($message = 'failed', $code = 201)
    {
        return
            $this->response->array([
                'code'   => $code,
                $message => $message
            ]);
    }
}