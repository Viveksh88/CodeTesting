<?php
namespace Excellence\PushNotification\Model\Adminhtml\Config\Source;
 
class Template implements \Magento\Framework\Option\ArrayInterface
{
    const Dummy1 = 1;
    const Dummy2 = 2;
    const Dummy3 = 3;
    const Dummy4 = 4;
    
    public function toOptionArray()
    {
        return [['value' => null, 'label' => __('-- Select Page --')],
                ['value' => self:: Dummy1, 'label' => __('Dummy Data')], 
                ['value' => self:: Dummy2, 'label' => __('Dummy Data 2')],
                ['value' => self:: Dummy3, 'label' => __('Dummy Data 3')],
                ['value' => self:: Dummy4, 'label' => __('Dummy Data 4')],
                ];            
    }   
    public function optionArray()
    {
        return [
                self:: Dummy1 => __('Dummy Data'), 
                self:: Dummy2 => __('Dummy Data 2'),
                self:: Dummy3 => __('Dummy Data 3'),
                self:: Dummy4 => __('Dummy Data 4'),
            ];            
    }   
}