<?php
namespace Excellence\Table\Controller\Adminhtml\Index;
class Save extends \Magento\Backend\App\Action
{
   
    
    protected $resultPageFactory = false;
    protected $resultRedirectFactory = false;
    protected $_testFactory = false;
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Excellence\Table\Model\TestFactory $testFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->resultRedirectFactory = $context->getResultRedirectFactory();
        $this->_testFactory = $testFactory;
    }
    public function execute()
    {
        
        $post = $this->getRequest()->getPostValue();
        $test = $this->_testFactory->create();
        if(!empty($post['excellence_table_test_id'])){
            $test->load($post['excellence_table_test_id']);
        }
        $test->setTitle($post['title']);
        $test->setEmail($post['email']);
        $test->save();
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('excellence1/index/index');
        return $resultRedirect;
    }
}