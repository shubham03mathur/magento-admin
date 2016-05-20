<?php
namespace Excellence\Table\Controller\Index;
use Magento\Framework\Controller\ResultFactory; 
class Edit extends \Magento\Framework\App\Action\Action
{
    protected $resultPageFactory;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Excellence\Table\Model\TestFactory $testFactory,
        \Excellence\Table\Model\Test1Factory $test1Factory,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Message\ManagerInterface $messageManager)
    {
        $this->_testFactory = $testFactory;
        $this->_test1Factory = $test1Factory;
        $this->resultPageFactory = $resultPageFactory;  
        $this->resultRedirectFactory = $context->getResultRedirectFactory();     
        $this->messageManager = $messageManager; 
        return parent::__construct($context);
    }
     
    public function execute()
    {   
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $test = $this->_testFactory->create();
        $test1 = $this->_test1Factory->create();
        $post = $this->getRequest()->getPost('data');
        $id   = $this->getRequest()->getParam('id');
        $status= $post['IsActive'];
        print_r($status);
        if(isset($post['submit'])) {
            $test->saveEdit($post,$id);
            $test1->saveEditStatus($status,$id);
            $this->messageManager->addSuccess( __('Data Edited Successfully!!') );
            $resultRedirect = $this->resultRedirectFactory->create();
            $resultRedirect->setPath('*/*/');
            return $resultRedirect;
        }
        return $this->resultPageFactory->create(); 
    } 
}