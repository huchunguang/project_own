<?php
use Swoole\Server;
class MYSQLPool
{
    private $pdo;
    private $server;
    public function __construct()
    {
        $this->server = new swoole_server('0.0.0.0', 9501);
        $this->server->set(array(
            'worker_num' => 8,
            'daemonize'  => true,
            'max_request'=> 10000,
            'dispatch_mode' => 3,
            'debug_mode' => 1,
            'task_worker_num' => 8,
        ));
        $this->server->on('WorkStart', array($this,'onWorkerStart'));
        $this->server->on('Connect', array($this,'onConnect'));
        $this->server->on('Receive', array($this,'onReceive'));
        $this->server->on('Close', array($this,'onClose'));
        $this->server->on('Task', array($this,'onTask'));
        //bind callback
        $this->server->on('Finish', array($this,'onFinish'));
        $this->server->start();
    }
    public function onWorkerStart($server,$worker_id)
    {
        echo "onWorkerStart\n";
        //判定是否为Task Worker进程
        if ($worker_id>= $server->setting['worker_num'])
        {
            $this->pdo = new PDO('mysql:host=localhost;port=3306;dbname=Test;', 'root', 'hu031310', array(
                PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES "UTF-8"',
                PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_PERSISTENT=>true
            ));
        }
    }
    public function onConnect($server,$fd,$from_id)
    {
        echo "Client {$fd} connect\n";    
    }
    public function onReceive(SWOOLE_SERVER $server,$fd,$from_id,$data)
    {
        $sql = array(
            'sql' => 'Insert into Test values(pid=?,name=?)',
            'param' => array(
                0,
                "'name'"
            ),
            'fd'=>$fd
        );
        $server->task(json_encode($sql));
    }
    public function onClose($server,$fd,$from_id)
    {
        echo "Client {$fd} close connection\n";
    }
    public function onTask($server,$task_id,$from_id,$data)
    {
        try {
            $sql = json_decode($data,true);
            $statement = $this->pdo->prepare($sql['sql']);
            $statement->execute($sql['param']);
            $server->send($sql['fd'],'Insert');
            return true;
        } catch (Exception $e) {
            var_dump($e);
            return false;
        }
    }    
    public function onFinish($server,$task_id,$data)
    {
        
    }
}