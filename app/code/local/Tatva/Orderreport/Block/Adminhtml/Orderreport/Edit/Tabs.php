<?php

class Tatva_Orderreport_Block_Adminhtml_Orderreport_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('orderreport_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('orderreport')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('orderreport')->__('Item Information'),
          'title'     => Mage::helper('orderreport')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('orderreport/adminhtml_orderreport_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}