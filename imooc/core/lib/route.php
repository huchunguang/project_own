<?php
namespace Core\lib;
class route
{
    public $ctrl;
    public $action;
    public function __construct()
    {
        echo 'route ok';
        print_r($_SERVER);
        if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/') 
        {
            $path=$_SERVER['REQUEST_URI'];
            $path_arr=explode('/', trim($path,'/'));
            print_r($path_arr);
        }
        else
        {
            $this->ctrl  ='index';
            $this->action='index';
        }
    }
}