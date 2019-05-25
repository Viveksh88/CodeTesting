<?php
namespace Excellence\PushNotification\Model\Adminhtml\Config\Source;
 
class ScheduleEvent implements \Magento\Framework\Option\ArrayInterface
{
    const Min15 = 1;
    const Min30 = 2;
    const Hr1 = 3;
    const Hr2 = 4;
    const Day1 = 5;
    const Custom = 6;
    
    public function toOptionArray()
    {
        return [['value' => null, 'label' => __('-- Select Page --')],
                ['value' => self:: Min15, 'label' => __('15 Minutes')], 
                ['value' => self:: Min30, 'label' => __('30 Minutes')],
                ['value' => self:: Hr1, 'label' => __('1 Hour')], 
                ['value' => self:: Hr2, 'label' => __('2 Hours')],
                ['value' => self:: Day1, 'label' => __('1 Day')], 
                ['value' => self:: Custom, 'label' => __('Custom')],
                ];            
    }
}