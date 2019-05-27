<?php
namespace Excellence\PushNotification\Block\Adminhtml\Notification\Edit\Tab;
class GeneralInformation extends \Magento\Backend\Block\Widget\Form\Generic implements \Magento\Backend\Block\Widget\Tab\TabInterface
{
    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;
    protected $_enabledDisabled;
    protected $_templates;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Data\FormFactory $formFactory
     * @param \Magento\Store\Model\System\Store $systemStore
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Store\Model\System\Store $systemStore,
        \Excellence\PushNotification\Model\Adminhtml\Config\Source\EnableDisable $enabledDisabled,
        \Excellence\PushNotification\Model\Adminhtml\Config\Source\Template $templates,
        array $data = array()
    ) {
        $this->_systemStore = $systemStore;
        $this->_enabledDisabled = $enabledDisabled;
        $this->_templates = $templates;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form
     *
     * @return $this
     */
    protected function _prepareForm()
    {
        /* @var $model \Magento\Cms\Model\Page */
        $model = $this->_coreRegistry->registry('pushnotification_notification');
        $isElementDisabled = false;
        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();

        $form->setHtmlIdPrefix('page_');

        $fieldset = $form->addFieldset('base_fieldset', array('legend' => __('General Information ')));

        if ($model->getId()) {
            $fieldset->addField('id', 'hidden', array('name' => 'id'));
        }
        $fieldset->addField(
            'name',
            'text',
            array(
                'name' => 'name',
                'label' => __('Name'),
                'title' => __('Name'),
                'required' => true,
            )
        );
        $fieldset->addField(
            'status',
            'select',
            array(
                'name' => 'status',
                'label' => __('Active'),
                'title' => __('Active'),
                'values' => $this->_enabledDisabled->toOptionArray(),
                'required' => true,
            )
        );
        $fieldset->addField(
            'store_view',
            'multiselect',
            array(
                'name' => 'store_view[]',
                'label' => __('Store View'),
                'title' => __('Store View'),
                'required' => true,
                'values' => $this->_systemStore->getStoreValuesForForm(false, true),
            )
        );
        $fieldset->addField(
            'template',
            'select',
            array(
                'name' => 'template',
                'label' => __('Template'),
                'title' => __('Template'),
                'required' => true,
                'values' => $this->_templates->toOptionArray(),
            )
        );
        
        if (!$model->getId()) {
            $model->setData('status', $isElementDisabled ? '2' : '1');
        }

        $form->setValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();   
    }

    /**
     * Prepare label for tab
     *
     * @return string
     */
    public function getTabLabel()
    {
        return __('General Information ');
    }

    /**
     * Prepare title for tab
     *
     * @return string
     */
    public function getTabTitle()
    {
        return __('General Information ');
    }

    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        return false;
    }

    /**
     * Check permission for passed action
     *
     * @param string $resourceId
     * @return bool
     */
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }
}
