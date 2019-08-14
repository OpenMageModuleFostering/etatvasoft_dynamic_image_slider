<?php

class Tatva_Promotionalbanner_Block_Adminhtml_Promotionalbanner_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('promotionalbanner_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('promotionalbanner')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('promotionalbanner')->__('Item Information'),
          'title'     => Mage::helper('promotionalbanner')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('promotionalbanner/adminhtml_promotionalbanner_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}