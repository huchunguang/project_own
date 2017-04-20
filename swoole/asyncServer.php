<?php
use Swoole\Client;
header('content-type:text/html;charset=utf-8');
$server = new swoole_server('127.0.0.1',9501);
//设置异步工作任务的进程数量
$server->set(array('task_worker_num'=>4));

$server->on('receive',function($server,$fd,$from_id,$data){
    $task_id = $server->task($data);
    echo "Dispatch asyncTask: id:$task_id\n";
});
//执行异步任务
$server->on('task',function($server,$task_id,$from_id,$data){
    echo "New AsyncTask{id=$task_id}".PHP_EOL;
    //返回任务的执行结果 
    $server->finish("$data ->  OK");
    
});

//执行异步任务的结果
$server->on('finish',function($server,$task_id,$data){
    echo "AsyncTask{$task_id} Finsh: $data".PHP_EOL;
});

//启动服务器
$server->start();