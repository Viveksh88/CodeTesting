<?php
namespace Excellence\PushNotification\Block\Adminhtml\Notification\Edit;

class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    protected function _construct()
    {
        parent::_construct();
        $this->setId('checkmodule_notification_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Notification Information'));
    }
}