<?php
 
namespace Excellence\Table\Block\Adminhtml\GridBlock;
 
class Grid extends \Magento\Backend\Block\Widget\Grid\Container
{
    protected function _construct()
    {
        $this->_blockGroup = 'Excellence_Hello';
        $this->_controller = 'adminhtml_griddata';
        $this->_headerText = __('Table Data');
        $this->_addButtonLabel = __('Add New Data');
        parent::_construct();
        
    }
}