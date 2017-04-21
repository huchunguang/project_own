<?php
use Swoole\Server;
header('content-type:text/html;charset=utf-8');
$server = new swoole_server('127.0.0.1',9501);
// $server->set(array(
//     'worker_num' => 2,//开启两个worker进程
//     'max_request' => 3,
//     'dispatch_mode' =>2,//空闲模式
//     'daemonize'     =>1,//启用后台守护进程模式
//     'log_file'      =>'/tmp/swoole.log',//LOG地址
//     'open_eof_check' => true,//打开EOF检测
//     'package_eof'    => "\r\n",//设置EOF数据包尾端
// ));
//监听连接进入事件
$server->on('connect',function($server,$fd){
    
    echo "Client: connect.\n";
});
$server->on('workerStart',function($server,$workerId){
    echo $server->setting['worker_num'].PHP_EOL;
//     echo $workerId.PHP_EOL;
});
//监听数据接受事件
$server->on('receive',function($server,$fd,$from_id,$data){
//     echo $server->master_pid.PHP_EOL;
//     echo $server->manager_pid.PHP_EOL;
    $server->send($fd,"Server:".$data);
});
//监听连接关闭事件
$server->on('close',function($server,$fd){
    echo "Client: close\n";
});
//启动服务器
$server->start();
