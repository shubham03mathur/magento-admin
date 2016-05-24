<?php
namespace Excellence\Table\Controller\Adminhtml\Index;
 
use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use Excellence\Table\Model\ResourceModel\Test\CollectionFactory;
 
class MassDelete extends \Magento\Backend\App\Action
{
    protected $filter;
 
    protected $collectionFactory;
 
 
    public function __construct(Context $context, Filter $filter, CollectionFactory $collectionFactory)
    {
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context);
    }
   
    public function execute()
    {
        
        $collection = $this->filter->getCollection($this->collectionFactory->create());
        $itemDeleted = 0;
        foreach ($collection as $item){
            $item->delete();
            $itemDeleted++;
        }
        $this->messageManager->addSuccess(__('A total of %1 record(s) have been deleted.', $itemDeleted));
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $resultRedirect->setPath('*/*/');
    }
}