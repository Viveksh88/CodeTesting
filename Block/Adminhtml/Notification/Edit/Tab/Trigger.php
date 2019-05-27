<?php
namespace Excellence\PushNotification\Block\Adminhtml\Notification\Edit\Tab;
class Trigger extends \Magento\Backend\Block\Widget\Form\Generic implements \Magento\Backend\Block\Widget\Tab\TabInterface
{
    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;
    protected $_triggerEvent;
    protected $_trigerType;
    protected $_scheduleEvent;

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
        \Excellence\PushNotification\Model\Adminhtml\Config\Source\TriggerType $triggerType,
        \Excellence\PushNotification\Model\Adminhtml\Config\Source\TriggerEvent $triggerEvent,
        \Excellence\PushNotification\Model\Adminhtml\Config\Source\ScheduleEvent $scheduleEvent,
        array $data = array()
    ) {
        $this->_systemStore = $systemStore;
        $this->_triggerEvent = $triggerEvent;
        $this->_triggerType = $triggerType;
        $this->_scheduleEvent = $scheduleEvent;
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

        $fieldset = $form->addFieldset('base_fieldset', array('legend' => __('Trigger')));

        if ($model->getId()) {
            $fieldset->addField('id', 'hidden', array('name' => 'id'));
        }
        $trigger_type = $fieldset->addField(
            'trigger_type',
            'select',
            array(
                'name' => 'trigger_type',
                'label' => __('Trigger Type'),
                'title' => __('Trigger Type'),
                'values' => $this->_triggerType->toOptionArray(),
                /*'required' => true,*/
            )
        );
        $schedule_event = $fieldset->addField(
            'schedule_event',
            'select',
            array(
                'name' => 'schedule_event',
                'label' => __('Schedule Event '),
                'title' => __('Schedule Event'),
                'values' => $this->_scheduleEvent->toOptionArray(),
                'required' => true,
            )
        );
        $custom_period = $fieldset->addField(
            'custom_period',
            'text',
            array(
                'name' => 'custom_period',
                'label' => __('Custom Period'),
                'title' => __('Custom Period'),
                'required' => true,
            )
        );
        $this->setChild(
            'form_after',
            $this->getLayout()->createBlock('\Magento\Backend\Block\Widget\Form\Element\Dependence')
            ->addFieldMap($trigger_type->getHtmlId(), $trigger_type->getName())
            ->addFieldMap($schedule_event->getHtmlId(), $schedule_event->getName())
            ->addFieldMap($custom_period->getHtmlId(), $custom_period->getName())
            ->addFieldDependence($schedule_event->getName(), $trigger_type->getName(), 2)
            ->addFieldDependence($custom_period->getName(), $schedule_event->getName(), 6)
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
        return __('Trigger');
    }

    /**
     * Prepare title for tab
     *
     * @return string
     */
    public function getTabTitle()
    {
        return __('Trigger');
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