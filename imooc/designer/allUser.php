<?php
/**
 * Ecos Platform
 *
 * @author     chunguang.hu
 * @copyright  Copyright (c) 2005-2017 ShopEx Technologies Inc. (http://www.shopex.cn)
 * @license    http://ecos.shopex.cn/ ShopEx License
 */
class allUser extends Iterator
{
    protected $ids=[];
    protected $index;
    public $db='';
    
 /* (non-PHPdoc)
     * @see Iterator::current()
     */
    public function __construct()
    {
        $this->db=Factory::getDatabase();
        $this->db->query('select id from users');
        $this->ids[]=$this->db->fetchAll();
    }
    public function current ()
    {
       $id= $this->ids[$this->index];
       return Factory::getUser($id);
    }

 /* (non-PHPdoc)
     * @see Iterator::key()
     */
    public function key ()
    {
        return $this->index;        
    }

 /* (non-PHPdoc)
     * @see Iterator::next()
     */
    public function next ()
    {
        $this->index++;        
    }

 /* (non-PHPdoc)
     * @see Iterator::rewind()
     */
    public function rewind ()
    {
        $this->index=0;
    }

 /* (non-PHPdoc)
     * @see Iterator::valid()
     */
    public function valid ()
    {
        return ($this->index < count($this->ids));
        
    }

    
} 