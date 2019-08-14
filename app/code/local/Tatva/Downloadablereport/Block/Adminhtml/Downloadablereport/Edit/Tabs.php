<?php

class Tatva_Downloadablereport_Block_Adminhtml_Downloadablereport_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('downloadablereport_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('downloadablereport')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('downloadablereport')->__('Item Information'),
          'title'     => Mage::helper('downloadablereport')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('downloadablereport/adminhtml_downloadablereport_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}