<?php
namespace app\base\controller;

use ClassLibrary\ClString;
use ClassLibrary\ClVerify;
use think\App;
use think\Controller;

class BaseController extends Controller {

    /**
     * 初始化函数
     */
    public function _initialize() {
        parent::_initialize();
        if (App::$debug) {
            // 日志文件
            //log_info('$_REQUEST:', request()->request());
        }
    }

    /**
     * 空请求
     * @return string
     */
    public function _empty() {
        $file = request()->module() . DS . 'view' . DS . request()->controller() . DS . request()->action() . '.html';
        $file = strtolower($file);
        if (is_file(APP_PATH . $file)) {
            return $this->fetch(APP_PATH . $file);
        } else {
            return '<h1 style="text-align: center;font-size: 5em;">404</h1>';
        }
    }
}