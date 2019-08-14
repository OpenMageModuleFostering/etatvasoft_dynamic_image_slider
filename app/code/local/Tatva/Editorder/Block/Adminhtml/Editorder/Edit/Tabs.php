<?php

class Tatva_Editorder_Block_Adminhtml_Editorder_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('editorder_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('editorder')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('editorder')->__('Item Information'),
          'title'     => Mage::helper('editorder')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('editorder/adminhtml_editorder_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}