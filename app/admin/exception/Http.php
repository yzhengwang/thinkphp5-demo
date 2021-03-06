<?php
// +========================================
// Created by PhpStorm
// +========================================
// User: MK192
// +========================================
// DateTime: 2019/1/6 15:02
// +========================================
// Description: MK192
// +========================================

namespace app\admin\exception;

use Exception;
use think\exception\Handle;
use think\exception\HttpException;
use think\exception\ValidateException;

class Http extends Handle {
    public function render(Exception $e) {
        // 参数验证错误
        if ($e instanceof ValidateException) {
            return json($e->getError(), 422);
        }
        // 请求异常
        if ($e instanceof HttpException && request()->isAjax()) {
            return response($e->getMessage(), $e->getStatusCode());
        }

        return view('common@Error/index');

        //可以在此交由系统处理
//        return parent::render($e);
    }
}