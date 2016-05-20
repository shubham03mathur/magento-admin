<?php
namespace Excellence\Table\Controller\Adminhtml\Table;
use Magento\Framework\Controller\ResultFactory;
class Index extends \Excellence\Table\Controller\Adminhtml\Table
{
    public function executeInternal()
    {
       $resultPage = $this->_initAction();
       $resultPage->getConfig()->getTitle()->prepend(__('Admin'));
       return $resultPage;
    }
}