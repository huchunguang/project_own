<?php
class RecursiveFileFilterIterator extends FilterIterator
{
    protected $ext = array('jpg','gif');
    
    /**
     * @brief 提供$path并生成对应的迭代器
     * @param string $path
     */
    public function __construct($path) 
    {
        parent::__construct(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path)));
    }
    /**
     * @brief 检查文件扩展名是否满足条件
     *
     */
    public function accept()
    {
        $item = $this->getInnerIterator();
        if (is_file($item) && in_array(pathinfo($item->getFilename(),PATHINFO_EXTENSION), $this->ext)) 
        {
            return true;
        }
    }
} 
foreach (new RecursiveFileFilterIterator($path) as $item)
{
    echo $item.PHP_EOL;
}