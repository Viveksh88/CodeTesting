<?php
namespace Excellence\PushNotification\Model\Adminhtml\Config\Source;
 
class ScheduleEvent implements \Magento\Framework\Option\ArrayInterface
{
    const MINUTES_15 = 1;
    const MINUTES_30 = 2;
    const HOUR_1 = 3;
    const HOUR_2 = 4;
    const DAY_1 = 5;
    const CUSTOM = 6;
    
    public function toOptionArray()
    {
        return [['value' => null, 'label' => __('-- Select Page --')],
                ['value' => self:: MINUTES_15, 'label' => __('15 Minutes')], 
                ['value' => self:: MINUTES_30, 'label' => __('30 Minutes')],
                ['value' => self:: HOUR_1, 'label' => __('1 Hour')], 
                ['value' => self:: HOUR_2, 'label' => __('2 Hours')],
                ['value' => self:: DAY_1, 'label' => __('1 Day')], 
                ['value' => self:: CUSTOM, 'label' => __('Custom')],
                ];            
    }
}