<?php

class Tatva_Customtab_Block_Adminhtml_Customtab_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('customtab_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('customtab')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('customtab')->__('Item Information'),
          'title'     => Mage::helper('customtab')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('customtab/adminhtml_customtab_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}