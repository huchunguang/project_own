<?php
namespace Core;
class Imooc 
{
    public static $classMap=array();
    public static function run()
    {
        $route=new \Core\lib\route();
    }
    public function load($classname)
    {
        //自动加载类库
        $classname=str_replace('\\', '/', $classname);
        if (isset(self::$classMap[$classname]))
        {
            return true;   
        }
        else
        {
            $filename=IMOOC.$classname.'.php';
            if (is_file($filename))
            {
                include $filename;
                self::$classMap[$classname]=$classname;
            }
            else
            {
                return false;
            }
        }
    }
}