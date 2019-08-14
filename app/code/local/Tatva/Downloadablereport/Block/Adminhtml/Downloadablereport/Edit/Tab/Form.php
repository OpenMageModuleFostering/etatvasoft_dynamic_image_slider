<?php

class Tatva_Downloadablereport_Block_Adminhtml_Downloadablereport_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('downloadablereport_form', array('legend'=>Mage::helper('downloadablereport')->__('Item information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('downloadablereport')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));

      $fieldset->addField('filename', 'file', array(
          'label'     => Mage::helper('downloadablereport')->__('File'),
          'required'  => false,
          'name'      => 'filename',
	  ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('downloadablereport')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('downloadablereport')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('downloadablereport')->__('Disabled'),
              ),
          ),
      ));
     
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('downloadablereport')->__('Content'),
          'title'     => Mage::helper('downloadablereport')->__('Content'),
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getDownloadablereportData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getDownloadablereportData());
          Mage::getSingleton('adminhtml/session')->setDownloadablereportData(null);
      } elseif ( Mage::registry('downloadablereport_data') ) {
          $form->setValues(Mage::registry('downloadablereport_data')->getData());
      }
      return parent::_prepareForm();
  }
}