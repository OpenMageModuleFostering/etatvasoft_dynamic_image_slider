<?php
class Tatva_Customtab_Block_Adminhtml_Customtab extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_customtab';
    $this->_blockGroup = 'customtab';
    $this->_headerText = Mage::helper('customtab')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('customtab')->__('Add Item');
    parent::__construct();
  }
}