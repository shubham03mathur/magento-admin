<?php
namespace Excellence\Table\Block;
  
class Add extends \Magento\Framework\View\Element\Template
{   
    protected $_testFactory;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Excellence\Table\Model\TestFactory $testFactory
    )
    {
        $this->_testFactory = $testFactory;
        parent::__construct($context);
    }
    protected function _prepareLayout()
    {
        $test = $this->_testFactory->create()->getCollection();
        $this->setTestModel($test);
       
    } 
    public function getListUrl()
    {
        return $this->_urlBuilder->getUrl("excellence/index/index/");
    } 
   
}
?>
