<?php

class Tatva_Promotionalbanner_Block_Adminhtml_Promotionalbanner_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('promotionalbanner_form', array('legend'=>Mage::helper('promotionalbanner')->__('Item information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('promotionalbanner')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));

      $fieldset->addField('filename', 'file', array(
          'label'     => Mage::helper('promotionalbanner')->__('File'),
          'required'  => false,
          'name'      => 'filename',
	  ));
	  
	  $fieldset->addField('position', 'select', array(
          'label'     => Mage::helper('promotionalbanner')->__('Banner Position'),
          'required'  => false,
          'name'      => 'position',
		  'values'	  => array(''),
	  ));
	  
	  $fieldset->addField('sort_order', 'text', array(
          'label'     => Mage::helper('promotionalbanner')->__('Sort'),
          'required'  => false,
          'name'      => 'position',
	  ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('promotionalbanner')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('promotionalbanner')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('promotionalbanner')->__('Disabled'),
              ),
          ),
      ));
     
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('promotionalbanner')->__('Content'),
          'title'     => Mage::helper('promotionalbanner')->__('Content'),
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getPromotionalbannerData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getPromotionalbannerData());
          Mage::getSingleton('adminhtml/session')->setPromotionalbannerData(null);
      } elseif ( Mage::registry('promotionalbanner_data') ) {
          $form->setValues(Mage::registry('promotionalbanner_data')->getData());
      }
      return parent::_prepareForm();
  }
}