<?php
class Tatva_Attachpdf_Block_Adminhtml_Attachpdf extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_attachpdf';
    $this->_blockGroup = 'attachpdf';
    $this->_headerText = Mage::helper('attachpdf')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('attachpdf')->__('Add Item');
    parent::__construct();
  }
}