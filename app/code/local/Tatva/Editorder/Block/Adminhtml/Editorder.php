<?php
class Tatva_Editorder_Block_Adminhtml_Editorder extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_editorder';
    $this->_blockGroup = 'editorder';
    $this->_headerText = Mage::helper('editorder')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('editorder')->__('Add Item');
    parent::__construct();
  }
}