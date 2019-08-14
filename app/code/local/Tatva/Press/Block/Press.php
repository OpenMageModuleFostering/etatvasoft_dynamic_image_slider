<?php
class Tatva_Press_Block_Press extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getPressCollection()     
     { 
     	$store_id = Mage::app()->getStore()->getId();
		$collection = Mage::getModel('press/press')->getCollection()->addFieldToFilter('status',1)->setOrder('date','DESC');
		$_id = Mage::getResourceModel('press/press')->getStoreId($store_id);
		$final_collection = array();
		foreach($collection as $_collection)
		{
			if(array_key_exists($_collection['press_id'],$_id))
			{
				$final_collection[] = $_collection->getData();
			}
		}
		//echo "<pre/>";print_r($final_collection);exit;
		return $final_collection;
     }
	 
	 public function getPressView()     
     { 
		$pressItem = Mage::getModel('press/press')->getCollection()->addFieldToFilter('press_id',$this->getRequest()->getParam('id'));
		return $pressItem;
     }
}