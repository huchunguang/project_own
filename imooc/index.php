<?php
header('Content-type:text/html;charset=utf-8');
define('IMOOC',realpath('/'));
define('CORE', IMOOC.'/core');
define('APP', IMOOC.'/app');
if (DEBUG)
{
    ini_set('display_errors', 'On');
}
else
{
    ini_set('display_errors', 'Off');
}

include CORE.'/common/function.php';
include CORE.'/imooc.php';
\Core\Imooc::run();
if (version_compare(PHP_VERSION, '5.1.2','>='))
{
    spl_autoload_register('imooc::load',true,true);
}
else
{
    function __autoload($loadClassname)
    {
        //todo
        //
    }
}
