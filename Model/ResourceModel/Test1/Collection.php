<?php
namespace Excellence\Table\Model\ResourceModel\Test1;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Excellence\Table\Model\Test1','Excellence\Table\Model\ResourceModel\Test1');
    }
}
