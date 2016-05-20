<?php
namespace Excellence\Table\Model\ResourceModel\Test;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Excellence\Table\Model\Test','Excellence\Table\Model\ResourceModel\Test');
    }

    
}
?>