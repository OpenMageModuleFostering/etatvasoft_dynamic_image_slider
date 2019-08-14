<?php
class Tatva_Downloadablereport_Block_Adminhtml_Downloadablereport extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_downloadablereport';
    $this->_blockGroup = 'downloadablereport';
    $this->_headerText = Mage::helper('downloadablereport')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('downloadablereport')->__('Add Item');
    parent::__construct();
  }
}