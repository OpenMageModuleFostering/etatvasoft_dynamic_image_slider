<?php

class Tatva_Attachpdf_Block_Adminhtml_Attachpdf_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('attachpdf_form', array('legend'=>Mage::helper('attachpdf')->__('Item information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('attachpdf')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));

      $fieldset->addField('filename', 'file', array(
          'label'     => Mage::helper('attachpdf')->__('File'),
          'required'  => false,
          'name'      => 'filename',
	  ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('attachpdf')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('attachpdf')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('attachpdf')->__('Disabled'),
              ),
          ),
      ));
     
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('attachpdf')->__('Content'),
          'title'     => Mage::helper('attachpdf')->__('Content'),
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getAttachpdfData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getAttachpdfData());
          Mage::getSingleton('adminhtml/session')->setAttachpdfData(null);
      } elseif ( Mage::registry('attachpdf_data') ) {
          $form->setValues(Mage::registry('attachpdf_data')->getData());
      }
      return parent::_prepareForm();
  }
}