<?php
namespace Excellence\PushNotification\Model\Adminhtml\Config\Source;
 
class TriggerEvent implements \Magento\Framework\Option\ArrayInterface
{
    const Test1 = 1;
    const Test2 = 2;
    
    public function toOptionArray()
    {
        return [['value' => null, 'label' => __('-- Select Page --')],
                ['value' => self:: Test1, 'label' => __('Test 1')], 
                ['value' => self:: Test2, 'label' => __('Test 2')],
                ];            
    }   
}