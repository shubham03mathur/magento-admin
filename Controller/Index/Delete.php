<?php
namespace Excellence\Table\Controller\Index;
use Magento\Framework\Controller\ResultFactory; 
class Delete extends \Magento\Framework\App\Action\Action
{
    protected $resultPageFactory;
    protected $testFactory;
    protected $test1Factory;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Excellence\Table\Model\TestFactory $testFactory,
        \Excellence\Table\Model\Test1Factory $test1Factory,
        \Magento\Framework\Message\ManagerInterface $messageManager)
       
    {
	    $this->messageManager = $messageManager;
        $this->_testFactory = $testFactory; 
        $this->_test1Factory = $test1Factory;      
        return parent::__construct($context);
    }
     
    public function execute()
    {
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $test = $this->_testFactory->create();
        $test1 = $this->_test1Factory->create();
        $id = $this->getRequest()->getParam('id');
        if($test->deleteById($id) && $test1->deleteById($id)){

            $this->messageManager->addSuccess('Record Successfully Deleted!');
            $resultRedirect->setUrl($this->_redirect->getRefererUrl());
            return $resultRedirect;
        }  
    }
}
?>
