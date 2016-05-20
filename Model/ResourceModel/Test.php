<?php
namespace Excellence\Table\Model\ResourceModel;
use \Magento\Framework\App\ResourceConnection;
class Test extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('excellence_user','excellence_table_test_id');
    }
     public function fetchDataItem()
    {
        $table = $this->getMainTable();
        $table2 = $this->getTable('excellence_table_test1');
        $cond = $this->getConnection()->quoteInto('t1.excellence_table_test_id = t2.excellence_table_test1_id','');
        $where = $this->getConnection()->quoteInto('t2.excellence_table_test1_id = t1.excellence_table_test_id','');
        $select = $this->getConnection()->select()->from(array('t1'=>$table))->join(array('t2'=>$table2), $cond);
        $collection = $this->getConnection()->fetchAll($select);
        return $collection;
    }
 
}
?>