<?php
use Swoole\Server;
header('content-type:text/html;charset=utf-8');
$server = new swoole_http_server('127.0.0.1', 9501);
$server->on('request', function ($request,$response) {
    $response->end("<h1>hello Swoole. #".rand(1000, 9999)."</h1>");
});
$server->start();
