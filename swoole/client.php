<?php
header('content-type:text/html;charset=utf-8');
$client = new swoole_client(SWOOLE_SOCK_TCP);
//连接到服务器
if(!$client->connect('127.0.0.1',9501,5))
{
    die('connected failed !');
}
//向服务器发送数据
if (!$client->send('Hello World')) 
{
    die('sended failed !');
}
//从服务器接收数据
$data = $client->recv();
if (!$data) 
{
    die('recv failed !');
}
print_r($data);
//关闭连接
// $client->close();