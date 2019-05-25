<?php
namespace Excellence\PushNotification\Block\Adminhtml\Render;

use Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer;
use Magento\Framework\DataObject;
use Magento\Store\Model\StoreManagerInterface;
 
class Template extends AbstractRenderer
{
    protected $_templates;
    public function __construct(
        \Magento\Backend\Block\Context $context,
        StoreManagerInterface $storemanager,
        \Excellence\PushNotification\Model\Adminhtml\Config\Source\Template $template,
        array $data = array()
    ) {
        parent::__construct($context, $data);
        $this->_storeManager = $storemanager;
        $this->_templates = $template;
    }
    
    public function render(DataObject $row)
    {       
        $rowData = $row->getData();
        $templateId = $rowData['template'];
        $templateArray = $this->_templates->optionArray();
        return $templateArray[$templateId];
    }   
}