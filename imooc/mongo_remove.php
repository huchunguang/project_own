<?php
/**
 * Ecos Platform
 *
 * @author     chunguang.hu
 * @copyright  Copyright (c) 2005-2017 ShopEx Technologies Inc. (http://www.shopex.cn)
 * @license    http://ecos.shopex.cn/ ShopEx License
 */
$conn=new MongoClient('mongodb://localhost:27017/test');
// $res=$conn->test->c1->remove(['name'=>'user1']);
$res=$conn->test->c1->update(['name'=>'user5'],['$set'=>['age'=>33]]);
var_dump($res);die;

