<?php 
namespace Excellence\Table\Model\Adminhtml\Config\Source;
use Excellence\Table\Model\ResourceModel\Test1\CollectionFactory;

class Isactive implements \Magento\Framework\Option\ArrayInterface
{
   protected $collection;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        CollectionFactory $pageCollectionFactory
    ) {
        $this->collection = $pageCollectionFactory->create();
    }
    public function toOptionArray()
    {
        $optionArray = array();
        foreach ($this->collection->getData() as $data) {
            array_push($optionArray, array('value' => $data['id'], 'label' => $data['is_active']));
        }
        return $optionArray;  
    }  
}



















?>