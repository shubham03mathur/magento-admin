<?php
namespace Excellence\Table\Model;
class Test1 extends \Magento\Framework\Model\AbstractModel implements Test1Interface, \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'excellence_table_test1';

    protected function _construct()
    {
        $this->_init('Excellence\Table\Model\ResourceModel\Test1');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
    public function saveStatus($status,$uid){
        if(isset($status)){
            $this->setData('excellence_table_test1_id',$uid);
            $this->setIsActive($status);
            return $this->save();
        }       
    }
    public function saveEditStatus($status,$uid){
       if(isset($status)){
          $model=$this->load($uid);
          $model->setData('is_active',$status);
          return $model->save();
       }
    }
    public function getDataById($id){
        if($id){
            return $this->load($id)->getData();
        }
    }
    public function deleteById($id){
        if($id){
            return $this->load($id)->delete();
        }
    }
}
