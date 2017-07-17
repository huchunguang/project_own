<?php
/**
 * Ecos Platform
 *
 * @author     chunguang.hu
 * @copyright  Copyright (c) 2005-2017 ShopEx Technologies Inc. (http://www.shopex.cn)
 * @license    http://ecos.shopex.cn/ ShopEx License
 */
$conn=new MongoClient('mongodb://localhost:27017/test');
$db= $conn->test;
$c1=$db->c1;
$insert_arr=['name'=>'chunguang','age'=>23,'sex'=>'男'];
$res=$c1->insert($insert_arr);
var_dump($res);die;