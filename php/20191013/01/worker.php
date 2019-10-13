<?php

/**
 * Class Worker
 * worker工作进程
 */
class MyWorker{
    private $mainSocket; //保存socket服务端资源
    public $onMessage; //为每一链接绑定一个消息触发的回调事件
    public function __construct($address)
    {
        $this->mainSocket = stream_socket_server($address);
    }

    /**
     * 监听客户端请求
     */
    public function listen()
    {
        while(true){
            //从客户端中获取数据
            $clientSocket = stream_socket_accept($this->mainSocket);
            $clientMessage = fread($clientSocket,65535);
            if(is_callable($this->onMessage)){
                call_user_func($this->onMessage,$clientSocket,$this,$clientMessage);
            }
        }
    }

    /**
     * 向客户端发送数据
     * @param $fd
     * @param $message
     */
    public function send($fd,$message)
    {
        $http_response = "HTTP/1.1 200 OK\r\n";
        $http_response .= "Content-Type: text/html;charset=UTF-8\r\n";
        $http_response .= "Connection: keep-alive\r\n";
        $http_response .= "Server: php socket server\r\n";
        $http_response .= "Content-length: ".strlen($message)."\r\n\r\n";
        $http_response .= $message;
        fwrite($fd,$http_response);
        fclose($fd);
    }

    /**
     * 启动监听程序
     */
    public function run(){
        $this->listen();
    }

}