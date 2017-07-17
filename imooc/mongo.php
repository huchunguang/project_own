<?php
/**
 * Ecos Platform
 *
 * @author     chunguang.hu
 * @copyright  Copyright (c) 2005-2017 ShopEx Technologies Inc. (http://www.shopex.cn)
 * @license    http://ecos.shopex.cn/ ShopEx License
 */
$conn=new MongoClient('mongodb://localhost:27017/test');
$res=$conn->isMaster();
var_dump($res);die;
$db= $conn->test;
$c1=$db->c1;
$find_condition=array();
$res=$c1->find($find_condition)->count();
var_dump($res);die;
foreach ($res as $val)
{
    echo $val['name'].PHP_EOL;
}
