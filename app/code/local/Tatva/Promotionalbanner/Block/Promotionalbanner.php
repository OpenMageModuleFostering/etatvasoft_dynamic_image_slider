<?php
class Tatva_Promotionalbanner_Block_Promotionalbanner extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getPromotionalbanner()     
     { 
        if (!$this->hasData('promotionalbanner')) {
            $this->setData('promotionalbanner', Mage::registry('promotionalbanner'));
        }
        return $this->getData('promotionalbanner');
        
    }
}