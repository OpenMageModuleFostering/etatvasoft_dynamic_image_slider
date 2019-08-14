<?php
class Tatva_Orderreport_Block_Adminhtml_Orderreport extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_orderreport';
    $this->_blockGroup = 'orderreport';
    $this->_headerText = Mage::helper('orderreport')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('orderreport')->__('Add Item');
    parent::__construct();
  }
}