<?php
/**
 * 使用纯php简单实现Nginx功能
 */
require "worker.php";
class WebServer{
    private $worker;

    public function __construct()
    {
        //启动监听端口9090
       $this->worker =  new MyWorker("tcp://0.0.0.0:9090");
       $this->messageHandler();
       $this->worker->run();
    }

    /**
     * 客户端请求信息回调处理函数
     */
    public function messageHandler(){
        $this->worker->onMessage = function($fd,$connect,$message){
            //var_dump($message);请求头信息
            //var_dump($_GET); 获取不到查询字符串提交的get数据
            $response = "收到你的请求了";
            $connect->send($fd,$response);
        };
    }
}
new WebServer();