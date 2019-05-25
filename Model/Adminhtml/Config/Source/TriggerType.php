<?php
namespace Excellence\PushNotification\Model\Adminhtml\Config\Source;
 
class TriggerType implements \Magento\Framework\Option\ArrayInterface
{
    const Manual = 1;
    const Triggered = 2;
    
    public function toOptionArray()
    {
        return [['value' => null, 'label' => __('-- Select Page --')],
                ['value' => self:: Manual, 'label' => __('Manual Notification')], 
                ['value' => self:: Triggered, 'label' => __('Triggered Notification')],
                ];            
    }   
    public function optionArray()
    {
        return [
                self:: Manual => __('Manual Notification'), 
                self:: Triggered => __('Triggered Notification'),
            ];            
    } 
}