<?php
namespace Excellence\Table\Controller\Index;
use Magento\Framework\Controller\ResultFactory; 
class Add extends \Magento\Framework\App\Action\Action
{
    protected $resultPageFactory;
    protected $testFactory;
    protected $messageManager;
    protected $testnewFactory;
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
        return parent::__construct($context,$messageManager);
    }
     
    public function execute()
    {
    	$test = $this->_testFactory->create();
    	$test1 = $this->_test1Factory->create();
      $post = $this->getRequest()->getPostValue();
        if(isset($post['data']['submit'])){
          $id=$test->saveData($post); 
          $status=$post['data']['IsActive'];
          $test1->saveStatus($status,$id);
          $this->messageManager->addSuccess( __('Data Saved Successfully!!') );
          $resultRedirect = $this->resultRedirectFactory->create();
          $resultRedirect->setPath('*/*/');
          return $resultRedirect;
        }
        return $this->resultPageFactory->create();
    }   
}

?>
