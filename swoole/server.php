<?php
header('content-type:text/html;charset=utf-8');
$server = new swoole_server('127.0.0.1',9501);
//监听连接进入事件
$server->on('connect',function($server,$fd){
    echo "Client: connect.\n";
});
//监听数据接受事件
$server->on('receive',function($server,$fd,$from_id,$data){
    $server->send($fd,"Server:".$data);
});
//监听连接关闭事件
$server->on('close',function($server,$fd){
    echo "Client: close\n";
});
//启动服务器
$server->start();