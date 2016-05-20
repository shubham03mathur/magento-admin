<?php
namespace Excellence\Table\Block;
class Edit extends \Magento\Framework\View\Element\Template
{   
	protected $_testFactory;
    protected $_test1Factory;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Excellence\Table\Model\TestFactory $testFactory,
        \Excellence\Table\Model\Test1Factory $test1Factory
    )
    {
    	$this->_testFactory = $testFactory;
        $this->_test1Factory = $test1Factory;
        parent::__construct($context);
    }
    protected function _prepareLayout()
    {
 	    $test = $this->_testFactory->create();
        $test1 = $this->_test1Factory->create();
        $id = $this->getRequest()->getParam('id');
        $collectionData = $test->getDataById($id);
        $status = $test1->getDataById($id);
        $this->setStatusData($status);
        $this->setRowData($collectionData);
    }
    public function getListUrl()
    {
        return $this->_urlBuilder->getUrl("excellence/index/index/");
    }
}