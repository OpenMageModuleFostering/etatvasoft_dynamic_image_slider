<?php
class Tatva_Faqs_Block_Adminhtml_Faqs extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_faqs';
    $this->_blockGroup = 'faqs';
    $this->_headerText = Mage::helper('faqs')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('faqs')->__('Add Item');
    parent::__construct();
  }
}