<?php
header("content-type:text/html;charset=utf-8");
$pid=pcntl_fork();
if($pid=='-1')
{
    die('could not fork');
}
elseif($pid)
{
    echo posix_getpid();
    
    echo "parnet".PHP_EOL;
    pcntl_wait($status);
}
else
{
    //子进程得到的$pid为0，所以这里是子进程的执行逻辑.
    echo posix_getpid();
//     posix_kill(posix_getpid(), SIGHUP);
    echo 'child'.PHP_EOL;
}

