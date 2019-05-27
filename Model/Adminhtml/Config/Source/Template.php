<?php
namespace Excellence\PushNotification\Model\Adminhtml\Config\Source;
 
class Template implements \Magento\Framework\Option\ArrayInterface
{
    protected $_collectionFactory;
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Excellence\PushNotification\Model\ResourceModel\Templates\Collection $collectionFactory,
        array $data = []
    ) {
        $this->_collectionFactory = $collectionFactory;
    }
    public function toOptionArray()
    {
        try{
            $collection =$this->_collectionFactory->load();
            if(!empty($collection)){
                foreach ($collection as $templateName) {
                    $templateCollection[] = ['value' => $templateName['id'], 'label' => __($templateName['name'])];  
                }
            }else{
                $templateCollection[] = ['label' => __('Please Add Template First')];
            }
            return $templateCollection;
        }catch(Exception $e){
            echo $e->getMessage();
        }        
    }   
    public function optionArray()
    {
        $collection =$this->_collectionFactory->load();
        foreach ($collection as $templateName) {
            $templateCollection[$templateName['id']] = __($templateName['name']);
        }
        return $templateCollection; 
    }   
}