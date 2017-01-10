<?php
/**
 * Ecos Platform
 *
 * @author     chunguang.hu
 * @copyright  Copyright (c) 2005-2017 ShopEx Technologies Inc. (http://www.shopex.cn)
 * @license    http://ecos.shopex.cn/ ShopEx License
 */
class configArrrayaccess implements \ArrayAccess
{
    protected $path;
    protected $configs=array();
    public function __construct($path)
    {
        $this->path=$path;
    }
 /* (non-PHPdoc)
     * @see ArrayAccess::offsetExists()
     */
    public function offsetExists ($key)
    {
        return isset($this->configs[$key]);
    }

 /* (non-PHPdoc)
     * @see ArrayAccess::offsetGet()
     */
    public function offsetGet ($key)
    {
        if(empty($this->configs[$key]))
        {
            $file_path=$this->path.'/'.$key.'.php';
            $config=require_once $file_path;
            $this->configs[$key]=$config;
        }   
        else
        {
            
        }
        return $this->configs[$key];
    }

 /* (non-PHPdoc)
     * @see ArrayAccess::offsetSet()
     */
    public function offsetSet ($key, $value)
    {
        throw new RuntimeException('cannot write config file');
    }

 /* (non-PHPdoc)
     * @see ArrayAccess::offsetUnset()
     */
    public function offsetUnset ($key)
    {
        unset($this->configs[$key]);
    }

    
} 
$test=new configArrrayaccess(__DIR__.'/configs');
var_dump($test['configtest']);