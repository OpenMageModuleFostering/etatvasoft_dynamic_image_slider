<?php
class Tatva_Downloadablereport_Block_Downloadablereport extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getDownloadablereport()     
     { 
        if (!$this->hasData('downloadablereport')) {
            $this->setData('downloadablereport', Mage::registry('downloadablereport'));
        }
        return $this->getData('downloadablereport');
        
    }
}