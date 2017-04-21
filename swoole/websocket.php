<?php
use Swoole\Server;
$web_socket = new swoole_websocket_server('127.0.0.1', 9502);
//监听webSocket连接打开事件
$web_socket->on('open', function ($web_socket,$request) {
    $fd[]=$request->fd;
    $GLOBALS['fd'][] = $fd;
});
//监听webSocket消息事件
$web_socket->on('message',function ($web_socket,$frame) {
    $msg = "from".$frame->fd.":".$frame->data."\r\n";
    foreach ($GLOBALS['fd'] as $aa)
    {
        foreach ($aa as $i)
        {
            $web_socket->push($i,$msg);
        }
    }
});
//监听webSocket连接关闭事件
$web_socket->on('close',function($web_socket,$fd){
    echo "fd:{$fd} is closed\r\n";
});
//启动webSocket
$web_socket->start();