<?php
namespace socket;
use Swoole\Socket\ICallback;
use Swoole\Core\Config;
use Swoole\Core\Route;
use Parser\Factory as JFactory;
use db\Factory as DBFactory;
use task\TaskCenter;
class Server implements ICallback
{
    private $redis;
    public function __construct()
    {
        
    }
    public function onStart() 
    {
        echo 'server start,swoole version:'.SWOOLE_VERSION.PHP_EOL;
    }    
    public function onConnect()
    {
        $params = func_get_args();
        $fd = $params[1];
        echo "{$fd} connected\n";
    }
    public function onReceive($server,$frame) 
    {
        var_dump($frame->data);
        $this->parse($frame->data,$frame->fd,$server);
    }
    public function onClose() 
    {
        $params = func_get_args();
        $server = $params[0];
        $fd = $params[1];
        $param = array(
            'json'=>'Chat',
            'ctrl'=>'Chat',
            'method' => 'offline',
            'fd'   => $fd,
        );
        $this->parse($param,$fd,$server);
    }
    public function parse($param,$fd,$server)
    {
        
    }
    
    
    
}