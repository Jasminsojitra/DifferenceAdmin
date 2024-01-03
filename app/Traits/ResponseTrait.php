<?php

namespace App\Traits;

trait ResponseTrait
{
    public function success($msg, $data)
    {
        return response([
            'status' => true,
            'code' => 200,
            'msg' => $msg,
            'data' => $data
        ], 200);
    }

    public function data($msg, $key, $data)
    {
        return response([
            'status' => true,
            'code' => 200,
            'msg' => $msg,
            $key => $data
        ], 200);
    }

    public function error($msg)
    {
        return response([
            'status' => true,
            'code' => 500,
            'msg' => $msg,
        ], 500);
    }

    public function validatorError($error){
        return response([
            'status' => true,
            'code' => 500,
            'msg'=> 'check errors',
            'data' => $error
        ], 500);
    }

}