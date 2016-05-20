<?php
namespace Excellence\Table\Model\ResourceModel;
class Test1 extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('excellence_table_test1','user_id');
    }

}
