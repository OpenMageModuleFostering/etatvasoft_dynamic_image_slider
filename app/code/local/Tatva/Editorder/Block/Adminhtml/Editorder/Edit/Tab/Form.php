<?php

class Tatva_Editorder_Block_Adminhtml_Editorder_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('editorder_form', array('legend'=>Mage::helper('editorder')->__('Item information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('editorder')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));

      $fieldset->addField('filename', 'file', array(
          'label'     => Mage::helper('editorder')->__('File'),
          'required'  => false,
          'name'      => 'filename',
	  ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('editorder')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('editorder')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('editorder')->__('Disabled'),
              ),
          ),
      ));
     
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('editorder')->__('Content'),
          'title'     => Mage::helper('editorder')->__('Content'),
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getEditorderData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getEditorderData());
          Mage::getSingleton('adminhtml/session')->setEditorderData(null);
      } elseif ( Mage::registry('editorder_data') ) {
          $form->setValues(Mage::registry('editorder_data')->getData());
      }
      return parent::_prepareForm();
  }
}