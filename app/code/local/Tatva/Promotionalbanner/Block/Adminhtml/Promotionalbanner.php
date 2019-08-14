<?php
class Tatva_Promotionalbanner_Block_Adminhtml_Promotionalbanner extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_promotionalbanner';
    $this->_blockGroup = 'promotionalbanner';
    $this->_headerText = Mage::helper('promotionalbanner')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('promotionalbanner')->__('Add Item');
    parent::__construct();
  }
}