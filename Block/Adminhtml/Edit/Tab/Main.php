<?php
namespace Excellence\Table\Block\Adminhtml\Edit\Tab;
class Main extends \Magento\Backend\Block\Widget\Form\Generic implements \Magento\Backend\Block\Widget\Tab\TabInterface
{
    protected $_systemStore;
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Store\Model\System\Store $systemStore,
        array $data = []
    ) {
        $this->_systemStore = $systemStore;
        parent::__construct($context, $registry, $formFactory, $data);
    }
  
    protected function _prepareForm()
    {
        
        $model = $this->_coreRegistry->registry('table_edit');
        if ($this->_isAllowedAction('Excellence_Hello::save')) {
            $isElementDisabled = false;
        } else {
            $isElementDisabled = true;
        }
        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('table_');
        $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('Customer Information')]);
        if ($model->getId()) {
            $fieldset->addField('excellence_table_test_id', 'hidden', ['name' => 'excellence_table_test_id']);
        }
        $fieldset->addField(
            'title',
            'text',
            [
                'name' => 'title',
                'label' => __('Title'),
                'title' => __('Title'),
                'required' => true,
                'disabled' => $isElementDisabled
            ]
        );
        $fieldset->addField(
            'email',
            'text',
            [
                'name' => 'email',
                'label' => __('Email'),
                'title' => __('Email'),
                'required' => true,
                'disabled' => $isElementDisabled
            ]
        );
        $form->setValues($model->getData());
        $this->setForm($form);
        return parent::_prepareForm();
    }
    public function getTabLabel()
    {
        return __('Test Information');
    }
    public function getTabTitle()
    {
        return __('Test Information');
    }
    public function canShowTab()
    {
        return true;
    }
    public function isHidden()
    {
        return false;
    }
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }
}

