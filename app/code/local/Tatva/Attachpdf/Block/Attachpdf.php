<?php
class Tatva_Attachpdf_Block_Attachpdf extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getAttachpdf()     
     { 
        if (!$this->hasData('attachpdf')) {
            $this->setData('attachpdf', Mage::registry('attachpdf'));
        }
        return $this->getData('attachpdf');
        
    }
}