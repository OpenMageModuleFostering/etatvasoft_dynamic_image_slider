<?php
class Tatva_Customtab_Block_Customtab extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getCustomtab()     
     { 
        if (!$this->hasData('customtab')) {
            $this->setData('customtab', Mage::registry('customtab'));
        }
        return $this->getData('customtab');
        
    }
}