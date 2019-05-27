<?php
/**
 * Copyright © 2015 Excellence. All rights reserved.
 */
namespace Excellence\PushNotification\Model\ResourceModel;

/**
 * Notification resource
 */
class Notification extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('pushnotification_notification', 'id');
    } 
}
