<?php
class Tatva_Press_Block_Adminhtml_Press extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_press';
    $this->_blockGroup = 'press';
    $this->_headerText = Mage::helper('press')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('press')->__('Add Item');
    parent::__construct();
  }
  
  /*public function getHeaderCssClass()
    {
        return '';
    }*/
}