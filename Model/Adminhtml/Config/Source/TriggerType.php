<?php
namespace Excellence\PushNotification\Model\Adminhtml\Config\Source;
 
class TriggerType implements \Magento\Framework\Option\ArrayInterface
{
    const MANUAL = 1;
    const TRIGGERED = 2;
    
    public function toOptionArray()
    {
        return [['value' => null, 'label' => __('-- Select Page --')],
                ['value' => self:: MANUAL, 'label' => __('Manual Notification')], 
                ['value' => self:: TRIGGERED, 'label' => __('Triggered Notification')],
                ];            
    }   
    public function optionArray()
    {
        return [
                self:: MANUAL => __('Manual Notification'), 
                self:: TRIGGERED => __('Triggered Notification'),
            ];            
    } 
}