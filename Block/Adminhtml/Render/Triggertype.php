<?php
namespace Excellence\PushNotification\Block\Adminhtml\Render;

use Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer;
use Magento\Framework\DataObject;
use Magento\Store\Model\StoreManagerInterface;
 
class Triggertype extends AbstractRenderer
{
    protected $_type;
    public function __construct(
        \Magento\Backend\Block\Context $context,
        StoreManagerInterface $storemanager,
        \Excellence\PushNotification\Model\Adminhtml\Config\Source\TriggerType $Type,
        array $data = array()
    ) {
        parent::__construct($context, $data);
        $this->_storeManager = $storemanager;
        $this->_type = $Type;
    }
    
    public function render(DataObject $row)
    {   
        $rowInfo = $row->getData();
        $typeId = $rowInfo['trigger_type'];
        $getType = $this->_type->optionArray();
        return $getType[$typeId];
    }   
}