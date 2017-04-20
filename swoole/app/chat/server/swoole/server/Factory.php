<?php
namespace Swoole\Server;
use Swoole\Core\Factory as CFactory;
class Factory 
{
    public static function getInstance($adapter = 'http') 
    {
        $className = __NAMESPACE__."\\{$adapter}";
        return CFatory::getInstance($className);
            
    }
}