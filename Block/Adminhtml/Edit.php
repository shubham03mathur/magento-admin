<?php
namespace Excellence\Table\Block\Adminhtml;
class Edit extends \Magento\Backend\Block\Widget\Form\Container
{
    protected $_coreRegistry = null;
    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry,
        array $data = []
    ) {
        $this->_coreRegistry = $registry;
        parent::__construct($context, $data);
    }
    protected function _construct()
    {
        $this->_objectId = 'page_id';
        $this->_blockGroup = 'Excellence_Table';
        $this->_controller = 'adminhtml';
        parent::_construct();
        if ($this->_isAllowedAction('Excellence_Table::save')) {
            $this->buttonList->update('save', 'label', __('Save Page'));
            $this->buttonList->add(
                'saveandcontinue',
                [
                    'label' => __('Save and Continue Edit'),
                    'class' => 'save',
                    'data_attribute' => [
                        'mage-init' => [
                            'button' => ['event' => 'saveAndContinueEdit', 'target' => '#edit_form'],
                        ],
                    ]
                ],
                -100
            );
        } else {
            $this->buttonList->remove('save');
        }
        if ($this->_isAllowedAction('Excellence_Table::page_delete')) {
            $this->buttonList->update('delete', 'label', __('Delete Page'));
        } else {
            $this->buttonList->remove('delete');
        }
    }
    
    public function getHeaderText()
    {
        if ($this->_coreRegistry->registry('table_edit')->getId()) {
            return __("Edit Page '%1'", $this->escapeHtml($this->_coreRegistry->registry('table_edit')->getTitle()));
        } else {
            return __('New Page');
        }
    }
   
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }
    
    protected function _getSaveAndContinueUrl()
    {
        return $this->getUrl('excellence1/hello/save', ['_current' => true, 'back' => 'edit', 'active_tab' => '{{tab_id}}']);
    }
    
    protected function _prepareLayout()
    {
        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('page_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'page_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'page_content');
                }
            };
        ";
        return parent::_prepareLayout();
    }
}