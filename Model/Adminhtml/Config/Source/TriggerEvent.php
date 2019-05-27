<?php
namespace Excellence\PushNotification\Model\Adminhtml\Config\Source;
 
class TriggerEvent implements \Magento\Framework\Option\ArrayInterface
{
    const TEST_1 = 1;
    const TEST_2 = 2;
    
    public function toOptionArray()
    {
        return [['value' => null, 'label' => __('-- Select Page --')],
                ['value' => self:: TEST_1, 'label' => __('Test 1')], 
                ['value' => self:: TEST_2, 'label' => __('Test 2')],
                ];            
    }   
}