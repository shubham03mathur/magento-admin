<?php
namespace Excellence\Table\Block;
class Main extends \Magento\Framework\View\Element\Template
{   
    protected $_testFactory;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Excellence\Table\Model\TestFactory $testFactory,
        array $data = []
    )
    { 
        $this->_testFactory = $testFactory;
        parent::__construct($context,$data);
       $Collection = $this->_testFactory->create()->getCollection($this->_testFactory->create()->fetchData());
       $this->setCollection($Collection);
     }

    protected function _prepareLayout()
    {
        parent::_prepareLayout();


       // print_r($this->getCollection()); die();
        //if($this->getCollection())
        // {    
        //     $pager = $this->getLayout()->createBlock(
        //         'Magento\Theme\Block\Html\Pager',
        //         'excellence.test.record.pager'
        //     );
        //     $pager->setAvailableLimit(array(5=>5,10=>10,'all'=>'all'))->setShowAmounts(true)->setCollection($this->getCollection());
            
        //     $this->setChild('pager', $pager); 
               
        // } 
        $this->getCollection();
        return $this;  
    }
    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }
	public function getEditUrl($id)
    {
        return $this->_urlBuilder->getUrl("excellence/index/edit/", array('id' => $id));
    }
    public function getAddUrl()
    {
        return $this->_urlBuilder->getUrl("excellence/index/Add");
    }
    public function getDeleteUrl($id)
    {
        return $this->_urlBuilder->getUrl("excellence/index/delete/", array('id' => $id));
    }
    public function getListUrl()
    {
        return $this->_urlBuilder->getUrl("excellence/index/index/");
    }
}
?>
