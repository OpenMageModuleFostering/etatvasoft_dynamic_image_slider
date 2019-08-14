<?php
class Tatva_Orderreport_Block_Orderreport extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getOrderreport()     
     { 
        if (!$this->hasData('orderreport')) {
            $this->setData('orderreport', Mage::registry('orderreport'));
        }
        return $this->getData('orderreport');
        
    }
}