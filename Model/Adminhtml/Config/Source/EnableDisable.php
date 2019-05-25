<?php
namespace Excellence\PushNotification\Model\Adminhtml\Config\Source;
 
class EnableDisable implements \Magento\Framework\Option\ArrayInterface
{
    const Enable = 1;
    const Disable = 0;
    
    public function toOptionArray()
    {
        return [['value' => null, 'label' => __('-- Select Page --')],
                ['value' => self:: Enable, 'label' => __('Enabled')], 
                ['value' => self:: Disable, 'label' => __('Disabled')],
                ];            
    }   
    public function optionArray()
    {
        return [
                self:: Enable => __('Enabled'), 
                self:: Disable => __('Disabled'),
            ];            
    } 
}