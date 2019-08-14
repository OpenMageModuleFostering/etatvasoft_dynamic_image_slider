<?php

class Tatva_Orderreport_Block_Adminhtml_Orderreport_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('orderreport_form', array('legend'=>Mage::helper('orderreport')->__('Item information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('orderreport')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));

      $fieldset->addField('filename', 'file', array(
          'label'     => Mage::helper('orderreport')->__('File'),
          'required'  => false,
          'name'      => 'filename',
	  ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('orderreport')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('orderreport')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('orderreport')->__('Disabled'),
              ),
          ),
      ));
     
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('orderreport')->__('Content'),
          'title'     => Mage::helper('orderreport')->__('Content'),
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getOrderreportData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getOrderreportData());
          Mage::getSingleton('adminhtml/session')->setOrderreportData(null);
      } elseif ( Mage::registry('orderreport_data') ) {
          $form->setValues(Mage::registry('orderreport_data')->getData());
      }
      return parent::_prepareForm();
  }
}