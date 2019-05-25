<?php
namespace Excellence\PushNotification\Block\Adminhtml;
class Notification extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
		
        $this->_controller = 'adminhtml_notification';/*block grid.php directory*/
        $this->_blockGroup = 'Excellence_PushNotification';
        $this->_headerText = __('Notification');
        $this->_addButtonLabel = __('Add Notification'); 
        parent::_construct();
		
    }
}
