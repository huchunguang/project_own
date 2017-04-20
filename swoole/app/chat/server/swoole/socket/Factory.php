<?php
namespace Swoole\Socket;
use Swoole\Core\Factory as CFactory;
class Factory 
{
    public static function getIntance($adapter='Swoole',$config)
    {
        $className = __NAMESPACE__."\\{$adapter}";
        return CFactory::getInstance($className,$config);
    }
}