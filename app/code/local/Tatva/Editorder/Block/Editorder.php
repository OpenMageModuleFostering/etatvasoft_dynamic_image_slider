<?php
class Tatva_Editorder_Block_Editorder extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getEditorder()     
     { 
        if (!$this->hasData('editorder')) {
            $this->setData('editorder', Mage::registry('editorder'));
        }
        return $this->getData('editorder');
        
    }
}